# Use official PHP image with Apache
FROM php:8.2-apache

# Install required system dependencies and PHP extensions
RUN apt-get update && apt-get install -y \
    git unzip libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql pgsql

# Enable Apache mod_rewrite for CodeIgniter
RUN a2enmod rewrite

# Install Composer globally
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy project files into container
COPY . .

# Install PHP dependencies
RUN composer install


# Set permissions for writable directory
RUN chown -R www-data:www-data /var/www/html/writable

# Expose port 80 for web server
EXPOSE 80

# Start Apache
CMD ["apache2-foreground"]
