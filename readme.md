
# CPNV - Joutes

This project was created so the CPNV will be able to manage sport tournaments.


## Table of Contents

### [Getting started](#getting-started-1)
### [Prerequisites](#prerequisites)
### [Homestead](#homestead)
### [Composer](#composer)
### [Installation](#installation)


## Getting started
These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

### Prerequisites

We worked on an environment with the following software :

- Ubuntu 16.04
- Git
- PHP 7.1
- Nginx
- MySQL
- MariaDB
- Sqlite3
- Postgres
- Composer
- Node (With Yarn, PM2, Bower, Grunt and Gulp)
- Redis
- Memcached
- Beanstalkd

Not all the software on this list are required.

#### Homestead

_"Laravel Homestead is an official, pre-packaged Vagrant box that provides you a wonderful development environment without requiring you to install PHP, a web server, and any other server software on your local machine."_

To allow us to have exactly the same work environment, we decided to use Homestead. If you wish to use it, which we recommand you do, you can follow the official documentation [here](https://laravel.com/docs/5.3/homestead)

#### Composer

_Composer is a tool for dependency management in PHP. It allows you to declare the libraries your project depends on and it will manage (install/update) them for you._

```

php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('SHA384', 'composer-setup.php') === '55d6ead61b29c7bdee5cccfb50076874187bd9f21f65d8991d46ec5cc90518f447387fb9f76ebae1fbbacf329e583e30') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"

```

### Installation

First of all you need to clone the project on your local machine. You can either download the zip or use the git commands.

```
$ git clone https://github.com/CPNV-ES/Joutes.git
```

Now you need to install all the dependencies of the project.

```
$ composer install
```

Then you need to create a .env file. We recommand you copy the .env.example file.

```
$ cp .env.example .env
```

Once the file is created, you need to generate a new key.

```
$ php artisan key:generate
```

The project is almost up and running, the only thing left is to set up the DB. In the .env file you'll need to set the database information :

```
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=joutes
DB_USERNAME=homestead
DB_PASSWORD=secret
```

Then you'll need to run the migrations so the different tables for the project will be created in your DB.

```
$ php artisan migrate
```

To help anyone start working with the porject, we've set up some seeders to populate the database with testing data.

```
$ php artisan db:seed
```

So there, now you're up and running and you can start messing arround with the project.
