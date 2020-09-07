# ERP GIO DEX MAMADISIMO SSJ DIOS TORTUGA NINJA DECEPTICON master of the universe lomo plateado zidane cabeceador

![Solution Logo](https://serving.photos.photobox.com/44990638669a326e90cfa17bcae272834892d1f2007bd5c2257d9c6a143aab1058c00a0c.jpg)

# Installing

## Before start, you need to install
* [GIT Control Version](https://git-scm.com/)
* [Docker Desktop](https://www.docker.com/)

## Follow the steps

  * Open a console and clone the repository, and enter to the directory
    ```sh
    $ git clone ****************************
    $ cd ********
    ```
  * Setting the **enviroment** files
    * Copy **/.env-example** located in the root directory and paste it in the **/docker** folder
    * Edit Docker Database variables, here is an example:
        ```env
            MYSQL_VERSION=5.7
            MYSQL_DATABASE=order_management
            MYSQL_USER=default
            MYSQL_PASSWORD=secret
            MYSQL_PORT=3306
            MYSQL_ROOT_PASSWORD=root
            MYSQL_ENTRYPOINT_INITDB=./mysql/docker-entrypoint-initdb.d
            DB_HOST=mysql
        ```
    
    * Edit Laravel Database variables, here is an example:
        ```env
            DB_CONNECTION=mysql
            DB_HOST=mysql
            DB_PORT=3306
            DB_DATABASE=order_management
            DB_USERNAME=root
            DB_PASSWORD=root
        ```

  * Start docker services with the following command in the console
    ```sh
    $ cd docker
    $ docker-compose up -d mysql phpmyadmin apache2 workspace
    ```
    
  * In a new console navigate to the docker folder an enter to the bash with the following command:
    ```sh
    $ cd docker
    $ docker-compose ***********
    ```
  * Install the PHP dependencies with composer with the following command:
    ```sh
    $ composer install
    ```
    
  * Run the laravel migrations and seeds:
    ```sh
    $ php artisan migrate
    $ php artisan db:seed
    ```
  * Visit **http://localhost** to display the site
  * Visit **http://localhost:8080** to display the PhpMyAdmin:
  
### Technologies

[x] [PHP 7+](https://www.php.net/)
[x] [Laravel](https://laravel.com/)
[x] [Composer](https://getcomposer.org/)
[x] [Docker](https://www.docker.com/)
[x] [JavaScript](https://www.javascript.com/)
[x] [Bootstrap](https://getbootstrap.com/)
[x] [Xdebug](https://xdebug.org/)
[x] [Apache](https://www.apache.org/)
