# PHP image with Apache
FROM php:apache

# Install git, zip, unzip and mysqli
RUN apt-get update && \
    apt-get install -y git zip unzip && \
    docker-php-ext-install mysqli

# Install composer
COPY --from=composer/composer:latest-bin /composer /usr/bin/composer

RUN a2enmod rewrite