# PHP image with Apache
FROM php:8.1-apache

RUN echo "DocumentRoot /var/www/html/public" > /etc/apache2/sites-available/000-default.conf

# Enable rewrite mode
RUN a2enmod rewrite && sed -i 's/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf

# Install git, zip, unzip
RUN apt-get update && \
    apt-get install -y git zip unzip

# Install PHP Extensions
RUN docker-php-ext-install mysqli

# Install composer
COPY --from=composer/composer:latest-bin /composer /usr/bin/composer

# Change the current working directory
WORKDIR /var/www/html/public

# Change the owner of the container document root
RUN chown -R www-data:www-data /var/www/html