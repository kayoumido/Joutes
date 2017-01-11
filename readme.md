
# Laravel project Joutes

The "Joutes" project is a website created for the CPNV school to manage sports tournaments.


### Table of Contents

- [Requirments](#requirements)
- [Configuration](#configuration)
- [Installation](#installation)


### Requirements


**Homestead**

We decide to use Homestead for the project, this way everybody get the exactly same environement.

_"Laravel Homestead is an official, pre-packaged Vagrant box that provides you a wonderful development environment without requiring you to install PHP, a web server, and any other server software on your local machine."_

So we recommand to use it too. You can follow this [official laravel tutorial](https://laravel.com/docs/5.3/homestead) for anything concerning the homestead installation if you don't any have it.


**Alternativ way**

If you really don't want to use homestead, you can use your own environment and download the same configuration as us (see configuration step).


### Configuration

As I have already said, we use Homestead for the project so we have a vagrant box (virtual machine) with all these componments :
 - Ubuntu 16.04
 - Git
 - PHP 7.1
 - Nginx
 - MySQL
 - MariaDB
 - Sqlite3
 - Postgres
 - Composer
 - Node (With Yarn, PM2, Bower, Grunt, and Gulp)
 - Redis
 - Memcached
 - Beanstalkd


### Installation


**Composer**

You have to install [composer](https://getcomposer.org/) on your computer.

_"Composer is a tool for dependency management in PHP. It allows you to declare the libraries your project depends on and it will manage (install/update) them for you."_


**Joutes**

You have to download or clone our Joutes project, so click on the "Clone or download" button.


**Install all dependencies**

Go on your Joutes project and run this command : `composer install`, now composer will automaticly install all dependencies require for our project.


**Create and set the .env**

Go on your Joutes project and copy the ".env.example" file and rename it as ".env". This file is the "config" file of your project. Be carefull, all the things in the file are sensitive. If you have to set your database configuration, you will do that on the .env file.


**Genereate an app_key**

Go on your Joutes project and run this command : `php artisan key:generate`. This command will generate an app_key for you and set it automaticly on your .env file. This key is obligatory.


**Launch the website**

If you use Homestead, you have to go on your Homestead directory and run this command: `vagrant up`. Now, your server is ready and you have just to type the website name set on your ".homestead/Homestead.yaml" file in your browser or if you have only one website in your vagrant box, you can type the ip of your vagrant box in your browser. (The vagrant box ip is written on the ".homestead/Homestead.yaml" file)

If you don't use Homestead, go on your Joutes project and run this command : `php artisan serve`. This command launch the laravel's server and now you can see the website on your browser.


