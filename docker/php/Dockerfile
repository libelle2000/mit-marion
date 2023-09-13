FROM php:8.2-fpm-alpine

RUN mkdir /www

COPY --from=composer:2.6 /usr/bin/composer /usr/bin/composer

RUN apk add --update linux-headers $PHPIZE_DEPS \
    && pecl install xdebug-3.2.2 \
    && docker-php-ext-enable xdebug \
    && apk del $PHPIZE_DEPS

COPY docker/php/xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini
COPY docker/php/timezone.ini /usr/local/etc/php/conf.d/timezone.ini


WORKDIR /www
