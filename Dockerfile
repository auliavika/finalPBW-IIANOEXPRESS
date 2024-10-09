# Gunakan image PHP dengan FPM
FROM php:8.2-fpm

# Install dependencies OS
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl \
    libonig-dev \
    libxml2-dev \
    libzip-dev

# Install ekstensi PHP
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Set working directory
WORKDIR /var/www

# Copy composer.lock and composer.json
COPY composer.lock composer.json /var/www/

# Install composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Install dependencies via composer
RUN composer install --no-dev --no-scripts --no-autoloader

# Copy the rest of the application code
COPY . /var/www

# Ganti izin folder
RUN chown -R www-data:www-data /var/www

# Expose port 9000
EXPOSE 9000

# Jalankan PHP-FPM
CMD ["php-fpm"]
