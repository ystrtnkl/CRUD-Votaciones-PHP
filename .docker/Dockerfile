FROM php:8.3-apache

RUN a2enmod rewrite

# Install build dependencies for PECL extensions
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    curl \
    pkg-config \
    libssl-dev \
    libcurl4-openssl-dev \
    libicu-dev \
    libzip-dev \
    libxml2-dev \
    libreadline-dev \
    zlib1g-dev \
    build-essential \
    autoconf \
    m4 \
    re2c \
    procps \
    nano \
    supervisor \
    cron \
    sudo \
 && docker-php-ext-configure pdo_mysql --with-pdo-mysql=mysqlnd \
 && docker-php-ext-configure intl \
 && docker-php-ext-install pdo pdo_mysql mysqli intl opcache zip sockets

# --- Install MongoDB driver via PECL ---
RUN echo "extension=mongodb.so" > /usr/local/etc/php/conf.d/mongodb.ini \
 && pecl install mongodb \
 && php -m | grep mongodb || (echo "❌ MongoDB extension not installed!" && exit 1)

# Install Composer
COPY --from=composer:2.0 /usr/bin/composer /usr/local/bin/composer

# Install Xdebug
RUN pecl install xdebug \
 && docker-php-ext-enable xdebug

WORKDIR /var/www/html
