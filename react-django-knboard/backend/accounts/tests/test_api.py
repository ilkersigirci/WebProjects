import pytest
from django.contrib.auth import get_user_model
from rest_framework.reverse import reverse

from boards.utils import reverse_querystring

User = get_user_model()


@pytest.mark.parametrize(
    "query_kwargs,expected_status_code,expected_results_len",
    [
        ({}, 400, 0),
        ({"search": "steve"}, 400, 0),
        ({"board": "1"}, 200, 0),
        ({"board": "", "search": "ste"}, 400, 0),
        ({"board": "1", "search": ""}, 200, 0),
        ({"board": "1", "search": "st"}, 200, 0),
        ({"board": "a", "search": "ste"}, 400, 0),
        ({"board": "1", "search": "ste"}, 200, 0),
        ({"board": "2", "search": "ste"}, 200, 1),
    ],
)
def test_user_search(
    query_kwargs,
    expected_status_code,
    expected_results_len,
    api_client,
    board_factory,
    steve,
    amy,
):
    board1 = board_factory(id=1, owner=steve)
    board1.members.add(steve)

    board2 = board_factory(id=2, owner=amy)
    board2.members.add(amy)

    api_client.force_authenticate(user=steve)
    response = api_client.get(
        reverse_querystring("user-search", query_kwargs=query_kwargs)
    )
    assert response.status_code == expected_status_code
    if response.status_code == 200:
        assert len(response.data) == expected_results_len


def test_user_search_limit(api_client, board_factory, user_factory, steve):
    board = board_factory()
    board.members.add(steve)
    for i in range(10):
        user_factory(username=f"dave{i}")

    api_client.force_authenticate(user=steve)
    response = api_client.get(
        reverse_querystring(
            "user-search", query_kwargs={"board": str(board.id), "search": "dave"}
        )
    )
    assert response.status_code == 200
    assert len(response.data) == 8


def test_user_update(api_client, steve, amy):
    update_steve = lambda username: api_client.put(
        reverse("user-detail", kwargs={"pk": steve.id}), {"username": username}
    )

    # Not authenticated
    response = update_steve(username="new_steve")
    assert response.status_code == 401

    # Amy can't update steve
    api_client.force_authenticate(user=amy)
    response = update_steve(username="new_steve")
    assert response.status_code == 403

    # Steve can update
    assert len(User.objects.filter(username="new_steve")) == 0
    api_client.force_authenticate(user=steve)
    response = update_steve(username="new_steve")
    assert response.status_code == 200
    assert len(User.objects.filter(username="new_steve")) == 1

    # Validation for username
    response = update_steve(username="invalid username :)")
    assert response.status_code == 400


def test_user_detail(api_client, steve, amy):
    get_steve = lambda: api_client.get(reverse("user-detail", kwargs={"pk": steve.id}))

    # Not authenticated
    response = get_steve()
    assert response.status_code == 401

    # Steve can get detail
    api_client.force_authenticate(user=steve)
    response = get_steve()
    assert response.status_code == 200

    # Amy can't get Steve detail
    api_client.force_authenticate(user=amy)
    response = get_steve()
    assert response.status_code == 403
