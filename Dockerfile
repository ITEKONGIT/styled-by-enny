# Use PHP 8.2 FPM
FROM php:8.2-fpm

# Install dependencies
RUN apt-get update && apt-get install -y \
    git curl zip unzip libpng-dev libonig-dev libxml2-dev sqlite3 \
    && docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd

# Install Composer
COPY --from=composer:2.7 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /app

# Copy files
COPY . .

# Install PHP deps
RUN composer install --no-dev --optimize-autoloader

# Set Laravel permissions
RUN mkdir -p storage/framework storage/logs bootstrap/cache \
    && chmod -R 777 storage bootstrap/cache

# Expose port 8000
EXPOSE 8000

# Run Laravel
CMD php artisan serve --host=0.0.0.0 --port=8000
