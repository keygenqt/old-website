FROM php:7.2-fpm-alpine

# Install php dependency
RUN docker-php-ext-install mysqli pdo pdo_mysql
RUN docker-php-ext-enable pdo_mysql
