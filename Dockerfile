FROM php:8.2-cli

# Install dependency & ekstensi PHP yang dibutuhkan Laravel & MySQL
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    libpng-dev \
    && docker-php-ext-install pdo pdo_mysql zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /app

# Copy seluruh file project
COPY . .

# Install paket laravel (composer)
RUN composer install --no-dev --optimize-autoloader

# Set permission storage
RUN chmod -R 777 storage bootstrap/cache

# Jalankan server Laravel
CMD php artisan serve --host=0.0.0.0 --port=$PORT