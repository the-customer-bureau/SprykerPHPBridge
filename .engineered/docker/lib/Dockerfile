FROM alpine:3.16 as base

ARG UID=1000
ARG USER=php
ARG COMPOSER_VERSION=2.3.0

# Create a development user
RUN adduser $USER --disabled-password --home /$USER --uid $UID

# Install PHP Extensions
RUN apk add --no-cache \
    php8-cli \
    php8-phar \
    php8-mbstring \
    php8-json \
    php8-zip \
    php8-openssl \
    php8-dom \
    php8-xml \
    php8-session \
    php8-xmlwriter \
    php8-sockets \
    php8-simplexml \
    php8-bcmath \
    php8-xmlreader \
    php8-tokenizer \
    php8-iconv \
    php8-sodium \
    php8-fileinfo \
    php8-curl \
    php8-ctype \
    php8-pcntl \
    php8-posix

# Add wget to make requests
RUN apk add --no-cache wget

# Download and install composer
RUN wget -O /usr/bin/composer https://github.com/composer/composer/releases/download/$COMPOSER_VERSION/composer.phar && \
    chmod +x /usr/bin/composer

FROM base as dev

ARG FOLDER=lib

# Install and Configure XDebug
RUN apk add --no-cache php8-pecl-xdebug
COPY ./$FOLDER/xdebug.ini /etc/php8/conf.d/60_xdebug.ini

CMD ["tail", "-f", "/dev/null"]