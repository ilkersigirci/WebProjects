### pip install pipenv
### pipenv shell
### open code in this dir and select python interpreter as python-pipenv
### pipenv install django djangorestframework django-rest-knox
### django-admin startproject reactDjango
### python manage.py startapp leads
### Goto django project settings and add app to installed apps ('leads','rest_framework')
### create model
### python manage.py makemigrations leads -> create migration with recent changes
### python manage.py migrate -> Save migrations to db
### Create serializers and api
### Create urls
### At this point, basic rest api is created
### python manage.py runserver and it with postman
### send GET  request to http://localhost:8000/api/leads -> returns []
### send POST request to http://localhost:8000/api/leads/
####   header: Content-Type=application/json
####   body: raw json file with fields such as name, email, message
### send DELETE request to http://localhost:8000/api/leads/1/