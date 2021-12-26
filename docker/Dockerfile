FROM php:7.4-apache
RUN apt-get -y update \
    && apt-get install -y libicu-dev git unzip zip \
    && docker-php-ext-configure intl \
    && docker-php-ext-install pdo pdo_mysql mysqli intl
WORKDIR /var/www/html
RUN curl -sS https://getcomposer.org/installer | php
RUN mv composer.phar /usr/local/bin/composer
RUN a2enmod rewrite