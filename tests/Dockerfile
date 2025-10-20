FROM php:8.2-apache

# Install system dependencies (PostgreSQL + Intl)
RUN apt-get update && apt-get install -y \
    libpq-dev \
    libicu-dev \
    && docker-php-ext-install pdo pdo_pgsql pgsql intl

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Copy project files into the container
COPY . /var/www/html

# Set working directory
WORKDIR /var/www/html

# Change Apache root to the CodeIgniter public folder
RUN sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/000-default.conf

# Fix file permissions
RUN chown -R www-data:www-data /var/www/html

# Expose default HTTP port
EXPOSE 80

# Start Apache
CMD ["apache2-foreground"]
