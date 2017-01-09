FROM php:7.1-fpm

ARG USERID=1000

RUN usermod -u $USERID www-data && \
    mkdir -p /var/www && \
    chown -R www-data:www-data /var/www && \
    chmod 777 -R /var/www

RUN apt-get -qq update --fix-missing && \
    apt-get -q install -y \
        zlib1g-dev libicu-dev g++ \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libmcrypt-dev \
        libpng12-dev \
        libxml2-dev libxslt1-dev \
        libc-client-dev libkrb5-dev \
        libldap2-dev \
        libzip-dev \
        poppler-utils imagemagick \
        cloc \
        git-core \
        default-jdk ant

COPY docker-php-pecl-install /usr/local/bin/

RUN docker-php-ext-configure imap --with-imap-ssl --with-kerberos \
    && docker-php-ext-configure ldap --with-libdir=lib/x86_64-linux-gnu/ \
    && docker-php-ext-install iconv intl mysqli gd mbstring pdo_mysql xsl opcache imap ldap zip \
    && docker-php-pecl-install xdebug-2.4.0RC4

RUN curl -sS https://getcomposer.org/installer | php && \
    mv composer.phar /usr/local/bin/composer

COPY php.ini /usr/local/etc/php

VOLUME /var/www
WORKDIR /var/www
USER www-data
