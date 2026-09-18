FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    libicu-dev \
    libzip-dev \
    libpng-dev \
    libonig-dev \
    zip \
    git \
    curl \
    && docker-php-ext-install intl zip gd pdo pdo_mysql mbstring \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app
COPY . .

RUN composer install --optimize-autoloader --no-dev --no-interaction --no-scripts

EXPOSE 8000
CMD php artisan package:discover --ansi && php artisan serve --host=0.0.0.0 --port=8000