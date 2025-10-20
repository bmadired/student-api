FROM php:8.2-apache

RUN apt-get update && apt-get install -y \
    git unzip libpq-dev libicu-dev \
    && docker-php-ext-configure intl \
    && docker-php-ext-install intl pdo pdo_pgsql pgsql

RUN a2enmod rewrite

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Set working directory to the public folder, not repo root
WORKDIR /var/www/html

# Copy everything
COPY . .

# Move CodeIgniter public files to Apache root
RUN rm -rf /var/www/html/index.html || true
RUN cp -r ./public/* /var/www/html/

RUN composer install --no-interaction --optimize-autoloader

RUN chown -R www-data:www-data /var/www/html/writable

EXPOSE 80

CMD ["apache2-foreground"]
