FROM php:8.2-apache
RUN apt-get update && apt-get install -y libpng-dev libonig-dev libxml2-dev zip unzip git curl libzip-dev && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip
RUN a2enmod rewrite
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
WORKDIR /var/www/html
COPY . .
RUN composer install --no-dev --optimize-autoloader
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache
COPY docker-apache.conf /etc/apache2/sites-available/000-default.conf
EXPOSE 80
CMD ["apache2-foreground"]