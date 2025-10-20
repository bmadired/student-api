FROM php:8.2-apache

# Install dependencies
RUN apt-get update && apt-get install -y libpq-dev libicu-dev \
    && docker-php-ext-install pdo pdo_pgsql pgsql intl

# Enable Apache rewrite
RUN a2enmod rewrite

# Set working directory
WORKDIR /var/www/html

# Copy project files
COPY . /var/www/html

# Update Apache root to public/
RUN sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/000-default.conf

# Fix permissions for writable directory
RUN mkdir -p /var/www/html/writable && \
    chown -R www-data:www-data /var/www/html/writable && \
    chmod -R 775 /var/www/html/writable

EXPOSE 80
CMD ["apache2-foreground"]
