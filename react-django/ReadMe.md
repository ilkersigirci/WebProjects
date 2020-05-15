## Initial

### pip install pipenv
### pipenv shell
### open code in this dir and select python interpreter as python-pipenv

## Django Rest Api

### pipenv install django djangorestframework django-rest-knox
### django-admin startproject reactDjango
### python manage.py startapp leads
### Goto django project settings and add app to installed apps ('leads','rest_framework')
### create model
### python manage.py makemigrations leads -> create migration with recent changes
### python manage.py migrate -> Save migrations to db
### Create serializers and api
### Create urls
### python manage.py runserver and it with postman
### send GET  request to http://localhost:8000/api/leads -> returns []
### send POST request to http://localhost:8000/api/leads/
####   header: Content-Type=application/json
####   body: raw json file with fields such as name, email, message
### send DELETE request to http://localhost:8000/api/leads/1/

## Adding React as Frontend

### python manage.py startapp frontend
### mkdir -p .\frontend\src\components                    
### mkdir -p .\frontend\{static, templates}\frontend  # doesn't work on windows
### In root folder, npm init -y
### npm i -D webpack webpack-cli
### npm i -D @babel/core babel-loader @babel/preset-env @babel/preset-react babel-plugin-transform-class-properties
### npm i react react-dom prop-types
### Add .babelrc and webpack.config.js
### Change package.json script to
  ### "dev":   "webpack --mode development --watch ./reactDjango/frontend/src/index.js --output ./reactDjango/frontend/static/frontend/main.js",    -> --watch makes build on change
  ### "build": "webpack --mode production  ./reactDjango/frontend/src/index.js --output ./reactDjango/frontend/static/frontend/main.js"
### Create index.js in frontend/src/
### Create App.js in frontend/src/components/
### Create index.html in frontend/templates/frontend.
### Modify frontend/view.py
### Create urls.py in frontend/
### Modify urls.py in reactDjango
### npm run dev -> In root
### python manage.py runserver -> In reactDjango