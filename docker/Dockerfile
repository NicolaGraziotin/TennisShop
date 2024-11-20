# PHP image with Apache
FROM php:apache

# Copy virtual host into container
COPY 000-default.conf /etc/apache2/sites-available/000-default.conf

# Enable rewrite mode
RUN a2enmod rewrite

# Install git, zip, unzip
RUN apt-get update && \
    apt-get install -y git zip unzip

# Install PHP Extensions
RUN docker-php-ext-install mysqli

# Install composer
COPY --from=composer/composer:latest-bin /composer /usr/bin/composer

# Change the current working directory
WORKDIR /var/www/html

# Change the owner of the container document root
RUN chown -R www-data:www-data /var/www/html

# Start Apache in foreground
CMD ["apache2-foreground"]