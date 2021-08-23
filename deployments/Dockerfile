ARG php_version
ARG app_version


FROM php:${php_version}

LABEL version=${app_version}

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN apt-get update && apt install --no-install-recommends -y \
    curl \ 
    libzip-dev \
    unzip \
    zip \
    zlib1g-dev && \
    apt-get clean

RUN curl -s https://getcomposer.org/installer | php

RUN mv composer.phar /usr/local/bin/composer

RUN docker-php-ext-configure zip && \
    docker-php-ext-install -j$(nproc) \
    zip


RUN a2enmod rewrite && \
    a2enmod ssl

WORKDIR /var/www/html