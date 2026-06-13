FROM php:8.4-cli

# Instalar dependencias del sistema y extensiones PHP necesarias para Laravel
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    zip \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    && docker-php-ext-install pdo pdo_mysql zip mbstring exif pcntl bcmath gd

# Copiar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app

# NOTA: En desarrollo, el volumen del docker-compose sobrescribirá esto,
# pero dejamos el COPY para que Composer instale las dependencias inicialmente si es necesario.
COPY . .

RUN composer install --no-interaction --optimize-autoloader --no-scripts

EXPOSE 8000

CMD php artisan serve --host=0.0.0.0 --port=8000