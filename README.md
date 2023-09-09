# todo-list
1 Instruction to run the app locally
    1.1 Run ```composer install```
    1.2 Setup .env file with correct db configuration
    1.3 Run ```php artisan key:gen```
    1.4 Run ```php artisan serve``` to serve the application
    
3 Instruction to test the app in docker by setting up docker locally
    2.1 Run ```docker-compose build``` to build the docker
    2.2 Run ```docker-compose up``` to start the docker
    2.3 Run ```docker ps``` to check docker status
    2.4 May use Docker Desktop to observe running status, the docker container may be able to run with http://localhost:8000/api/{path} (example) 

2 Instruction to test the app in docker by downloading docker images
    2.1 Run ```docker pull szeweilam/todo-list:app``` to download Docker image (app) to local machine.
    2.2 Run ```docker pull szeweilam/todo-list:db``` to download Docker image (database) to local machine.
    2.3 Run ```docker pull szeweilam/todo-list:webserver``` to download Docker image (webserver) to local machine.
    2.4 docker run -d -p 8000:8000 --name todo-list szeweilam/todo-list:app
