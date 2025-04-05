# Устанавливаем базовый образ PHP с FPM
FROM php:8.2-fpm

# Устанавливаем зависимости
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql mbstring exif pcntl bcmath gd

# Устанавливаем Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Устанавливаем Xdebug
RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

# Создаем рабочую директорию
WORKDIR /var/www

# Создаем и настраиваем папки var/ (добавлено здесь)
RUN mkdir -p /var/www/var/cache /var/www/var/log && \
    chown -R www-data:www-data /var/www/var && \
    chmod -R 777 /var/www/var

# Копируем конфигурацию PHP и Xdebug
COPY docker/php/php.ini /usr/local/etc/php/conf.d/custom.ini
COPY docker/xdebug/xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini

# Меняем права для пользователя www-data
RUN chown -R www-data:www-data /var/www
USER www-data