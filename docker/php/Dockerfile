# Используем официальный образ PHP для Symfony
FROM php:8.1-fpm

# Устанавливаем системные зависимости и расширения PHP
RUN apt-get update && apt-get install -y \
    zip \
    unzip \
    git \
    nano

# Устанавливаем Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Устанавливаем рабочую директорию
WORKDIR /var/www

# Копируем файлы проекта в контейнер
COPY . /var/www
