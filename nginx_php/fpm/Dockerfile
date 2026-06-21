FROM php:8.5-fpm

# Ставим необходимые модули
RUN apt-get update && apt-get install -y \
	libfreetype6-dev \
	libjpeg62-turbo-dev \
	libpng-dev \
	libonig-dev \
	libzip-dev \
	libssl-dev \
        libmemcached-dev \
        zlib1g-dev \
	&& docker-php-ext-install -j$(nproc) iconv mbstring mysqli pdo_mysql zip gd \
	&& docker-php-ext-configure gd --with-freetype --with-jpeg \
        && rm -rf /var/lib/apt/lists/*

# Устанавливаем расширение memcached через PECL и включаем его
RUN pecl install memcached \
    && docker-php-ext-enable memcached


# Для русской локали
RUN apt update && apt install -y locales && \
    sed -i '/ru_RU.UTF-8/s/^# //g' /etc/locale.gen && \
    locale-gen

ENV LANG=ru_RU.UTF-8
ENV LANGUAGE=ru_RU:ru
ENV LC_ALL=ru_RU.UTF-8

COPY ./php.ini /usr/local/etc/php/conf.d/php-custom.ini

WORKDIR /data

CMD ["php-fpm"]
