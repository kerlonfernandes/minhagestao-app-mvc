# Use an official PHP runtime as a parent image
FROM php:8.2-apache

# Set working directory inside the container
WORKDIR /var/www/html

# Copy the current directory contents into the container at /var/www/html
COPY . /var/www/html

# Install Git
RUN apt-get update && apt-get install -y git

# Install any additional PHP extensions if needed (e.g., for MySQL, PostgreSQL)
RUN docker-php-ext-install mysqli pdo pdo_mysql sockets

# Enable Apache modules if needed (e.g., mod_rewrite)
RUN a2enmod rewrite

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install

# Expose port 80 to the outside world
EXPOSE 80

# Set the environment variable
ENV APACHE_DOCUMENT_ROOT /var/www/html

# Update the default apache site with the new DocumentRoot
# RUN sed -ri -e 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/*.conf

# Start Apache in the foreground
CMD ["apache2-foreground"]

