FROM php:8.3-fpm

RUN apt-get update && apt-get install -y \
    libssl-dev \
    pkg-config \
    libicu-dev \
 && docker-php-ext-install intl \
 && apt-get clean && rm -rf /var/lib/apt/lists/*