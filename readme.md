<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About

Description: Its a small project using Laravel Framework PHP7,Mysql for running a restaurant site and api services

Procedure:
1. Make sure the xampp is installed
2. Place the project in htdocs folder of xampp
3. IN the root directory create these folders storage/framework under it create folders
     1. sessions
     2. views
     3. cache
4. rename file env to .env
5. Connect database with proper credentials in database/database.php and .env
3. Run the Apache
4. Make sure to import database from database folder
6. Run the project
     1. go to root directory
     2. run git bash
     3. run command 'composer install'
     4. run command 'php artisan serve'
     5. bash provides the url go to the url http://127.0.0.1:8000/
    
Demo:
1. http://laravel-45.herokuapp.com/
2. http://laravel-45.herokuapp.com/api/ (used for nextjs_project for api)
