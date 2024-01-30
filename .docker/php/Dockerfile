FROM php:8.3-apache
RUN docker-php-ext-install pdo_mysql

RUN apt-get update && apt-get install -y

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer