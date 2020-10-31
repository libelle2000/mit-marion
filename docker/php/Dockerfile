FROM php:7.4.10-fpm-alpine

RUN mkdir /www

RUN apk add $PHPIZE_DEPS \
    && pecl install xdebug-2.9.6 \
    && docker-php-ext-enable xdebug \
    && apk del $PHPIZE_DEPS

COPY docker/php/xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini
COPY docker/php/timezone.ini /usr/local/etc/php/conf.d/timezone.ini


WORKDIR /www
