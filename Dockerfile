FROM php:8.2-fpm-alpine

LABEL maintainer="Aldy <github.com/aldysufri17>"

WORKDIR /var/www/

RUN apk add --no-cache \
    nodejs \
    npm \
    icu-dev zlib-dev libzip-dev \
    libpng-dev libwebp-dev libjpeg-turbo-dev freetype-dev \
    g++ make autoconf pkgconf \
    && docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp \
    && docker-php-ext-install gd mysqli pdo_mysql intl opcache exif zip \
    && apk del g++ make autoconf pkgconf \
    && rm -rf /usr/src/php*

RUN wget https://getcomposer.org/composer-stable.phar -O /usr/local/bin/composer && chmod +x /usr/local/bin/composer

COPY . /var/www

EXPOSE 9000

CMD ["php-fpm"]
