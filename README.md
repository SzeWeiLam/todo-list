# todo-list
## 1. Instruction to run the app locally
1.1 Run composer install

1.2 Setup .env file with correct db configuration

1.3 Run ```php artisan key:gen```
    
1.4 Run ```php artisan serve``` to serve the application
    
## 2. Instruction to test the app in docker by setting up docker locally
2.1 Run ```docker-compose build``` to build the docker
    
2.2 Run ```docker-compose up``` to start the docker
    
2.3 Run ```docker ps``` to check docker status
    
2.4 Run docker-compose exec database bash then run mysql -u root -p and enter password
    
2.5 Run CREATE DATABASE todo-list; to create a new database
    
2.6 Run docker exec -it todo-list php artisan migrate to set up tables into database
    
2.7 May use Docker Desktop to observe running status, the docker container may be able to run with http://localhost:8000/api/{path} (example) 

## 3. Test APIs using CURL or POSTMAN (Login to get token)
3.1 Run http://127.0.0.1:8000/api/login in any browser and login google account, user {token} will be returned.
    E.g : ```ya29.a0AfB_byBUzDtKxPCtPNkdQSGGuo1l4kxYiRTkzsiiKvwkiLekvEAq5q7zEZz_Ghhie4AwJwOWaifMik2xd_HOVkNJZjne32ODD76-IactzD9oRMVsODvsE9B1xWe1OxfWy41XbTKoUkPBV0P4cxZGGnc376wA0IeNmCwaCgYKAccSARESFQGOcNnCz3BvmOYNtcRUk6RHRH7wHA0170```

3.2 Use the token to set it as Bearer Token in postman before testing any API OR run curl --location 'http://127.0.0.1:8000/api/{route}/{param}' \ --header 'Authorization: Bearer {token} in terminal.
Note that the login token will be expired in 1 hour right after login.

## 4. Test APIs using CURL or POSTMAN (Get todo list)
4.1 Use the token to set it as Bearer Token in postman before running GET request of *http://127.0.0.1:8000/api/todo-list/*

**OR**

4.2 Run ```curl --location 'http://127.0.0.1:8000/api/todo-list' \
--header 'Authorization: Bearer {token}'``` in terminal.

## 5. Test APIs using CURL or POSTMAN (Store todo list)
5.1 Use the token to set it as Bearer Token in postman before running POST request of *http://127.0.0.1:8000/api/todo-list/* with body of form data with params (name & description).

**OR**

5.2 Run ```curl --location 'http://127.0.0.1:8000/api/todo-list' \
--header 'Authorization: Bearer {token}' \
--form 'name="Update meeting minutes"' \
--form 'description="Update meeting minutes and email to manager."'``` in terminal.

## 6. Test APIs using CURL or POSTMAN (Update todo list to complete)
6.1 Use the token to set it as Bearer Token in postman before running POST request of *http://127.0.0.1:8000/api/todo-list/update/1* 

**OR** 

6.2 Run ```curl --location 'http://127.0.0.1:8000/api/todo-list/update/1' \
--header 'Authorization: Bearer {token}' \
--form 'status="1"'``` in terminal.

## 7. Test APIs using CURL or POSTMAN (Delete todo list)
7.1 Use the token to set it as Bearer Token in postman before running DELETE request of *http://127.0.0.1:8000/api/todo-list/1* 

**OR** 

7.2 Run ```curl --location --request DELETE 'http://127.0.0.1:8000/api/todo-list/1' \
--header 'Authorization: Bearer {token}'``` in terminal.
    
