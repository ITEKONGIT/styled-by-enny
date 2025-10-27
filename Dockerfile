FROM php:8.2-cli

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git curl zip unzip libzip-dev libpng-dev libonig-dev libxml2-dev \
    && docker-php-ext-install zip pdo pdo_mysql mbstring exif pcntl bcmath gd

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /app

# Copy only composer files first (for better caching)
COPY composer.json composer.lock ./

# Install dependencies without running scripts
RUN composer install --no-dev --optimize-autoloader --no-interaction --no-scripts

# Copy the rest of the application
COPY . .

# Now run the Laravel optimizations and package discovery
RUN php artisan config:clear && \
    php artisan cache:clear && \
    php artisan package:discover --no-interaction

# Fix permissions
RUN chmod -R 775 storage bootstrap/cache

# Start server
CMD php artisan serve --host=0.0.0.0 --port=${PORT:-8000}
