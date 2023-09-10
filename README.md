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
3.1 Run http://127.0.0.1:8000/api/login in any browser and login google account, user token will be returned.

3.2 Use the token to set it as Bearer Token in postman before testing any API OR run curl --location 'http://127.0.0.1:8000/api/{route}/{param}' \ --header 'Authorization: Bearer {token} in terminal.

## 4. Test APIs using CURL or POSTMAN (Get todo list)
4.1 Use the token to set it as Bearer Token in postman before running GET request of *http://127.0.0.1:8000/api/todo-list/*

**OR**

4.2 Run ```curl --location --request POST 'http://127.0.0.1:8000/api/todo-list/' \
--header 'Authorization: Bearer ya29.a0AfB_byDXxIug6lvKuzCvw2AHp2jy-vx3_NBe75W4qDSImnpf5OIG7aeiM1DV9dDaAiB9f-QkyQmrmLg2K5PrBmajETCdonQV6k-6aIaTHAVIF5IxRT25Hpz8XbTqP6rcvg857KUjNzZlhV3qZnjBiDQaK6IPwC7NpwUaCgYKAaQSARESFQGOcNnCC-XGH7ZIdxO1u5FP_bvOBQ0170'``` in terminal.

## 5. Test APIs using CURL or POSTMAN (Update todo list to complete)
5.1 Use the token to set it as Bearer Token in postman before running POST request of *http://127.0.0.1:8000/api/todo-list/update/1* 

**OR** 

5.2 Run ```curl --location 'http://127.0.0.1:8000/api/todo-list/update/1' \
--header 'Authorization: Bearer ya29.a0AfB_byDXxIug6lvKuzCvw2AHp2jy-vx3_NBe75W4qDSImnpf5OIG7aeiM1DV9dDaAiB9f-QkyQmrmLg2K5PrBmajETCdonQV6k-6aIaTHAVIF5IxRT25Hpz8XbTqP6rcvg857KUjNzZlhV3qZnjBiDQaK6IPwC7NpwUaCgYKAaQSARESFQGOcNnCC-XGH7ZIdxO1u5FP_bvOBQ0170' \
--form 'status="1"'``` in terminal.

## 5. Test APIs using CURL or POSTMAN (Delete todo list)
5.1 Use the token to set it as Bearer Token in postman before running DELETE request of *http://127.0.0.1:8000/api/todo-list/1* 

**OR** 

5.2 Run ```curl --location --request DELETE 'http://127.0.0.1:8000/api/todo-list/1' \
--header 'Authorization: Bearer ya29.a0AfB_byDXxIug6lvKuzCvw2AHp2jy-vx3_NBe75W4qDSImnpf5OIG7aeiM1DV9dDaAiB9f-QkyQmrmLg2K5PrBmajETCdonQV6k-6aIaTHAVIF5IxRT25Hpz8XbTqP6rcvg857KUjNzZlhV3qZnjBiDQaK6IPwC7NpwUaCgYKAaQSARESFQGOcNnCC-XGH7ZIdxO1u5FP_bvOBQ0170'``` in terminal.
    
