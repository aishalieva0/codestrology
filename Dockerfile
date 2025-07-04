FROM php:8.2-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git curl zip unzip libpng-dev libonig-dev libxml2-dev libzip-dev \
    && docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd zip

# Install Composer
COPY --from=composer:2.5 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy only composer files
COPY composer.json composer.lock ./

# Install PHP dependencies (skip scripts for now)
RUN composer install --no-dev --optimize-autoloader --no-scripts

# Copy rest of the application
COPY . .

# Set permissions
RUN chown -R www-data:www-data /var/www/html

# Manually run package discovery after full app copied
RUN php artisan package:discover --ansi

# Generate app key (if not done via .env)
RUN php artisan key:generate

# Expose port
EXPOSE 8000

CMD php artisan serve --host=0.0.0.0 --port=8000
