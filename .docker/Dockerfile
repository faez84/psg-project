FROM php:7.2-fpm-alpine

RUN apk update \
    && apk add --virtual build-deps \
        autoconf \
        build-base \
        icu-dev \
        libevent-dev \
        openssl-dev \
        zlib-dev \
    && apk add \
        bzip2 \
        git \
        mariadb-client \
        nodejs \
        nodejs-npm \
        yarn \
        zlib \
        openssh \
        nginx \
        libpng \
        libpng-dev \
        libjpeg \
        libjpeg-turbo-dev \
        libwebp-dev \
        freetype \
        freetype-dev

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer

RUN docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/

RUN docker-php-ext-install -j$(getconf _NPROCESSORS_ONLN) \
    intl \
    gd \
    mbstring \
    pdo_mysql \
    sockets \
    zip

RUN pecl channel-update pecl.php.net \
    && pecl install -o -f \
        redis \
        event \
    && rm -rf /tmp/pear \
    && echo "extension=redis.so" > /usr/local/etc/php/conf.d/redis.ini \
    && echo "extension=event.so" > /usr/local/etc/php/conf.d/event.ini
COPY composer.* /var/www/html/
COPY .docker/php.ini /usr/local/etc/php/
COPY .docker/nginx.conf /etc/nginx/nginx.conf
COPY .docker/sites.conf /etc/nginx/conf.d/default.conf
COPY .docker/startup.sh /usr/local/bin/
RUN composer install --no-interaction

RUN mkdir -p \
        /var/www/html \
        /var/www/html/bin \
        /var/www/html/vendor \
        /var/www/html/storage \
        /run/nginx \
    && ln -sf /dev/stdout /var/log/nginx/access.log \
    && ln -sf /dev/stderr /var/log/nginx/error.log

EXPOSE 80

CMD ["/usr/local/bin/startup.sh"]