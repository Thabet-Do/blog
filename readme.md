**How To Use:**


Run `Without Docker`:\
1 - clone git by command:

    $ git clone https://github.com/sabeat/blog.git 

2 - open project folder:
    
    $ cd blog
    
3 - run server:

    $ php artisan serve
    
3 - open url and enjoy :

    localhost:8000/
  



Run `With Docker`:

1 - clone git by command:

    $ git clone https://github.com/sabeat/blog.git 

2 - open project folder:
    
    $ cd blog

3 - run docker:

    $ docker-compose up -d nginx mysql phpmyadmin redis workspace rabbitmq
    
4 - open url and enjoy :

    localhost/