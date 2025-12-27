# syntax=docker/dockerfile:1 

FROM php:7.4-apache

RUN apt-get update && apt-get install -y \
    libicu-dev \
    libmcrypt-dev \
    libpq-dev \
    libzip-dev \
    git \
    unzip \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install \
    intl \
    pdo_pgsql \
    zip \
    bcmath

RUN pecl install mcrypt \
    && docker-php-ext-enable mcrypt
       

RUN a2enmod rewrite


ENV APACHE_DOCUMENT_ROOT /var/www/html/app/webroot

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf | sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/conf-available/*.conf

WORKDIR /var/www/html

COPY . .

RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 777 /var/www/html/app/tmp