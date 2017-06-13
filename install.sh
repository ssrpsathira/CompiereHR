#!/bin/bash

# Install PHP
sudo apt-get install python-software-properties software-properties-common
sudo LC_ALL=C.UTF-8 add-apt-repository ppa:ondrej/php
sudo apt-get update
sudo apt-get remove php5-common -y
sudo apt-get purge php5-common -y
sudo apt-get install php7.0 php7.0-fpm php7.0-mysql -y

# Install MySQL
sudo debconf-set-selections <<< 'mysql-server mysql-server/root_password password password'
sudo debconf-set-selections <<< 'mysql-server mysql-server/root_password_again password password'
sudo apt-get -y install mysql-server

# Setup app environment
php bin/console server:start 0.0.0.0:8000
php bin/console doctrine:database:create
php bin/console doctrine:schema:update --force
php composer.phar install