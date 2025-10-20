# Use official PHP 8 image
FROM php:8.2-apache

# Enable extensions
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Copy project
COPY . /var/www/html/

# Enable Apache mod_rewrite for CodeIgniter
RUN a2enmod rewrite
RUN echo "<Directory /var/www/html/> \
    AllowOverride All \
    </Directory>" >> /etc/apache2/apache2.conf

# Expose Render's port
EXPOSE 10000
ENV PORT=10000

# Start Apache
CMD ["apache2-foreground"]
