FROM php:8.5-fpm-bookworm

ARG UID=1000
ARG GID=1000

ENV COMPOSER_ALLOW_SUPERUSER=1 \
    COMPOSER_HOME=/home/app/.composer

RUN apt-get update \
    && apt-get install -y --no-install-recommends \
        ca-certificates \
        curl \
        git \
        gosu \
        libfreetype6-dev \
        libicu-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
        libzip-dev \
        unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j"$(nproc)" \
        bcmath \
        exif \
        gd \
        intl \
        opcache \
        pcntl \
        pdo_mysql \
        zip \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer:2 /usr/bin/composer /usr/local/bin/composer

RUN (groupadd --gid "${GID}" app 2>/dev/null || groupadd app) \
    && useradd --uid "${UID}" --gid app --create-home --shell /bin/bash app \
    && mkdir -p /var/www/html /home/app/.composer/cache \
    && chown -R app:app /var/www/html /home/app

COPY docker/php/php.ini /usr/local/etc/php/conf.d/99-starter.ini
COPY docker/php/opcache.ini /usr/local/etc/php/conf.d/10-opcache.ini
COPY docker/php/entrypoint.sh /usr/local/bin/starter-entrypoint

RUN chmod +x /usr/local/bin/starter-entrypoint \
    && sed -ri 's/^user = .*/user = app/' /usr/local/etc/php-fpm.d/www.conf \
    && sed -ri 's/^group = .*/group = app/' /usr/local/etc/php-fpm.d/www.conf

WORKDIR /var/www/html

ENTRYPOINT ["starter-entrypoint"]
CMD ["php-fpm", "-F"]
