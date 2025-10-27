# Use PHP 8.2 FPM
FROM php:8.2-fpm

# Install dependencies
RUN apt-get update && apt-get install -y \
    git curl zip unzip libpng-dev libonig-dev libxml2-dev sqlite3 \
    libzip-dev \
    && docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy composer files first (for better caching)
COPY composer.json composer.lock ./

# Install PHP deps (with error handling)
RUN composer install --no-dev --optimize-autoloader --no-interaction || \
    composer install --no-dev --optimize-autoloader --no-interaction --ignore-platform-reqs

# Copy the rest of the application
COPY . .

# Set Laravel permissions
RUN chown -R www-data:www-data storage bootstrap/cache
RUN chmod -R 775 storage bootstrap/cache

# Expose port 8000
EXPOSE 8000

# Run Laravel
CMD php artisan serve --host=0.0.0.0 --port=${PORT:-8000}
