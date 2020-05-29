from itertools import chain

from django.contrib.auth import get_user_model
from django.db import transaction
from rest_framework import mixins
from rest_framework.decorators import action
from rest_framework.permissions import IsAuthenticated
from rest_framework.response import Response
from rest_framework.status import HTTP_400_BAD_REQUEST, HTTP_200_OK
from rest_framework.views import APIView
from rest_framework.viewsets import GenericViewSet

from .models import Board, Task, Column, Label
from .permissions import IsOwner, IsOwnerForDangerousMethods
from .serializers import (
    BoardSerializer,
    TaskSerializer,
    ColumnSerializer,
    BoardDetailSerializer,
    MemberSerializer,
    BoardMemberSerializer,
    LabelSerializer,
)
from .viewsets import ModelDetailViewSet

User = get_user_model()


class BoardViewSet(
    mixins.CreateModelMixin,
    mixins.RetrieveModelMixin,
    mixins.DestroyModelMixin,
    mixins.ListModelMixin,
    GenericViewSet,
):
    queryset = Board.objects.all()
    serializer_class = BoardSerializer
    permission_classes = [IsAuthenticated, IsOwnerForDangerousMethods]

    def perform_create(self, serializer):
        serializer.save(owner=self.request.user)

    def get_serializer_class(self):
        if self.action == "retrieve":
            return BoardDetailSerializer
        return super().get_serializer_class()

    def get_queryset(self):
        user = self.request.user
        qs = super().get_queryset().filter(members=user)

        if self.action == "retrieve":
            return qs.prefetch_related("columns__tasks")
        return qs

    def get_member(self):
        try:
            member = User.objects.get(username=self.request.data.get("username"))
        except User.DoesNotExist:
            return None

        return member

    @action(
        detail=True,
        methods=["post"],
        serializer_class=MemberSerializer,
        permission_classes=[IsAuthenticated, IsOwner],
    )
    def invite_member(self, request, pk):
        users_ids = self.request.data.get("users")
        if not users_ids:
            return Response(status=HTTP_400_BAD_REQUEST)

        new_members = User.objects.filter(id__in=users_ids)
        if len(new_members) != len(users_ids):
            return Response(status=HTTP_400_BAD_REQUEST)

        self.get_object().members.add(*new_members)
        return Response(
            data=BoardMemberSerializer(instance=new_members, many=True).data
        )

    @action(detail=True, methods=["post"], serializer_class=MemberSerializer)
    def remove_member(self, request, pk):
        member = self.get_member()
        board = self.get_object()

        if not member or member == board.owner or board not in member.boards.all():
            return Response(status=HTTP_400_BAD_REQUEST)

        board.members.remove(member)
        for task in Task.objects.filter(column__board=board):
            task.assignees.remove(member)
        return Response(data=BoardMemberSerializer(instance=member).data)


class TaskViewSet(ModelDetailViewSet):
    queryset = Task.objects.all()
    serializer_class = TaskSerializer
    permission_classes = [IsAuthenticated]

    def get_queryset(self):
        user = self.request.user
        return super().get_queryset().filter(column__board__members=user)


class ColumnViewSet(ModelDetailViewSet):
    queryset = Column.objects.all()
    serializer_class = ColumnSerializer
    permission_classes = [IsAuthenticated]

    def get_queryset(self):
        user = self.request.user
        return super().get_queryset().filter(board__members=user)


class LabelViewSet(ModelDetailViewSet):
    queryset = Label.objects.all()
    serializer_class = LabelSerializer
    permission_classes = [IsAuthenticated]

    def get_queryset(self):
        user = self.request.user
        return super().get_queryset().filter(board__members=user)


class SortColumn(APIView):
    permission_classes = [IsAuthenticated]

    @transaction.atomic
    def post(self, request, **kwargs):
        try:
            return sort_model(request, Column)
        except (
            KeyError,
            IndexError,
            AttributeError,
            ValueError,
            Column.DoesNotExist,
        ):
            return Response(status=HTTP_400_BAD_REQUEST)


class SortTask(APIView):
    permission_classes = [IsAuthenticated]

    def move_tasks(self, request):
        tasks_by_column = request.data.get("tasks")
        board_id = request.data.get("board")
        board = Board.objects.get(id=board_id)
        pre_columns = Column.objects.filter(board=board)
        pre_tasks = Task.objects.filter(column__in=pre_columns).prefetch_related(
            "columns"
        )

        # Check for duplicate tasks
        flat_tasks = list(chain.from_iterable(tasks_by_column.values()))
        if len(flat_tasks) != len(set(flat_tasks)):
            raise ValueError

        for column_name, task_ids in tasks_by_column.items():
            column = pre_columns.get(id=column_name)
            tasks = pre_tasks.filter(pk__in=task_ids)
            tasks.update(column=column)

    def post(self, request, **kwargs):
        try:
            with transaction.atomic():
                self.move_tasks(request)
                return sort_model(request, Task)
        except (
            KeyError,
            IndexError,
            AttributeError,
            ValueError,
            Column.DoesNotExist,
            Task.DoesNotExist,
        ):
            return Response(status=HTTP_400_BAD_REQUEST)


def sort_model(request, Model):
    ordered_pks = request.data.get("order", [])

    # Check for duplicates
    if len(ordered_pks) != len(set(ordered_pks)):
        return Response(status=HTTP_400_BAD_REQUEST)

    objects_dict = dict(
        [(str(obj.pk), obj) for obj in Model.objects.filter(pk__in=ordered_pks)]
    )
    order_field_name = Model._meta.ordering[0]

    step = 1
    start_object = min(
        objects_dict.values(), key=lambda x: getattr(x, order_field_name)
    )
    start_index = getattr(start_object, order_field_name, len(ordered_pks))

    for pk in ordered_pks:
        obj = objects_dict.get(str(pk))

        # perform the update only if the order field has changed
        if getattr(obj, order_field_name) != start_index:
            setattr(obj, order_field_name, start_index)
            # only update the object's order field
            obj.save(update_fields=[order_field_name])

        start_index += step

    return Response(status=HTTP_200_OK)
