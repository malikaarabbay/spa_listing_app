FROM php:8.2-fpm

# Установка системных зависимостей и PHP-расширений
RUN apt-get update && apt-get install -y \
    git \
    curl \
    unzip \
    libzip-dev \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libicu-dev \
    zip \
    && docker-php-ext-install pdo pdo_mysql mbstring zip bcmath pcntl exif intl

# Установка Composer вручную с проверкой подписи
RUN curl -sS https://getcomposer.org/installer -o composer-setup.php && \
    php composer-setup.php --install-dir=/usr/local/bin --filename=composer && \
    rm composer-setup.php
