FROM php:8.2-fpm

# Copy composer.lock composer.json /var/www
COPY appservice/composer.lock appservice/composer.json   /var/www/

# Set working directory
WORKDIR /var/www

# Install dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    default-mysql-client \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl libcurl4-openssl-dev \
    freetds-bin freetds-dev freetds-common libct4 libsybdb5 tdsodbc libreadline-dev librecode-dev libpspell-dev libonig-dev

# Clear cache
RUN apt-get clean &&  rm -rf  /var/lib/apt/list/*

RUN ln -s /usr/lib/x86_64-linux-gnu/libsybdb.so /usr/lib/
RUN docker-php-ext-install pdo_dblib

RUN docker-php-ext-install mbstring
RUN docker-php-ext-install pdo_mysql


# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Add user for laravel application
RUN groupadd -g 1000 www
RUN useradd  -u 1000 -ms /bin/bash -g www www

# Copy existing application directory contents
COPY /appservice /var/www

# Copy existing applications directory permissions
COPY --chown=www:www /appservice /var/www

# Change current user to www
USER www

# Expose port and php-fpm server
EXPOSE 9000

CMD ["php-fpm"]


