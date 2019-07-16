FROM php:7.2-fpm

MAINTAINER William Tahira <wsantos@2mundos.net>
# Based on Cyber-Duck/php-fpm-laravel image

ENV XDEBUG="false"

RUN apt-get update && \
    apt-get install -y --force-yes --no-install-recommends \
        cron \
        git \
        libfreetype6-dev \
        libjpeg-dev \
        libmagickwand-dev \
        libmcrypt-dev \
        libmemcached-dev \
        libpng-dev \
        libpq-dev \
        libssl-dev \
        libxml2-dev \
        libz-dev \
        unzip \
        nodejs \
        imagemagick \
        ghostscript \
        ffmpeg \
        supervisor

# Install soap extention
RUN docker-php-ext-install soap

# Install the PHP mcrypt extention (from PECL, mcrypt has been removed from PHP 7.2)
RUN pecl install mcrypt-1.0.1
RUN docker-php-ext-enable mcrypt

# Install the PHP pcntl extention
RUN docker-php-ext-install pcntl

# Install the PHP zip extention
RUN docker-php-ext-install zip

# Install the PHP pdo_mysql extention
RUN docker-php-ext-install pdo_mysql

# Install the PHP pdo_pgsql extention
RUN docker-php-ext-install pdo_pgsql

# Install the PHP bcmath extension
RUN docker-php-ext-install bcmath

## Install supervidor
#RUN pip install supervisor

#####################################
# Imagick:
#####################################

RUN pecl install imagick && \
    docker-php-ext-enable imagick

#####################################
# GD:
#####################################

# Install the PHP gd library
RUN docker-php-ext-install gd && \
    docker-php-ext-configure gd \
        --enable-gd-native-ttf \
        --with-jpeg-dir=/usr/lib \
        --with-freetype-dir=/usr/include/freetype2 && \
    docker-php-ext-install gd

#####################################
# PHP Memcached:
#####################################

# Install the php memcached extension
RUN pecl install memcached && docker-php-ext-enable memcached

#####################################
# Composer:
#####################################

# Install composer and add its bin to the PATH.

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer && \
    composer --version && \
    mkdir /var/www/.composer && \
    chown www-data: /var/www/.composer

RUN echo "export PATH=${PATH}:/code/vendor/bin" >> ~/.bashrc
#
#--------------------------------------------------------------------------
# Final Touch
#--------------------------------------------------------------------------
#

RUN rm -r /var/lib/apt/lists/*

RUN usermod -u 999 www-data

EXPOSE 9000

# USER www-data

CMD ["php-fpm"]
