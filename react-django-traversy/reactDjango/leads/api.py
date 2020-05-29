from leads.models import Lead
from rest_framework import viewsets, permissions
from .serializers import LeadSerializer

# Lead Viewset
# viewset creates full crud api without having to specify explicit methods
# for functionality

class LeadViewSet(viewsets.ModelViewSet):
  queryset = Lead.objects.all()
  permission_classes = [
    permissions.AllowAny
  ]
  serializer_class = LeadSerializer
