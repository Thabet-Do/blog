**How To Use:**


Run `Without Docker`:\
1 - clone git by command:

    $ git clone https://github.com/sabeat/blog.git 

2 - open project folder:
    
    $ cd blog

3- composer install   

    $ composer install
 
4 - create database:\
create database "sentinel" and run the command 

    $ php artisan migrate
    
5 - run server:

    $ php artisan serve --port=8000
    
6 - open url and enjoy :

    localhost:8000/
  


Run `With Docker`:

1 - clone git by command:

    $ git clone https://github.com/sabeat/blog.git 

2 - open project folder:
    
    $ cd blog

3 - run docker:

    $ docker-compose up -d nginx mysql phpmyadmin redis workspace rabbitmq
   
4- open workspace in docker 
    
    $ docker-compose exec workspace bash
    
3- composer install   

    $ composer install    
    
5 - create database:\
create database "sentinel" and run the command inside workspace

    $ php artisan migrate
        
6 - open url and enjoy :

    localhost/