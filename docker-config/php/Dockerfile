FROM php:8.1-fpm
WORKDIR /var/www
ADD . /var/www

# permission
RUN chown -R www-data:www-data /var/www

# install composer
RUN cd /usr/bin && curl -s http://getcomposer.org/installer | php && ln -s /usr/bin/composer.phar /usr/bin/composer

# Update GPG keys
RUN apt-get update && apt-get install -y gnupg2 \
    && apt-key adv --keyserver keyserver.ubuntu.com --recv-keys 648ACFD622F3D138 \
    && apt-key adv --keyserver keyserver.ubuntu.com --recv-keys 0E98404D386FA1D9 \
    && apt-key adv --keyserver keyserver.ubuntu.com --recv-keys DCC9EFBF77E11517

# install packages
RUN apt-get update \
  && apt-get install -y \
  gcc \
  make \
  git \
  unzip \
  vim \
  libpng-dev \
  libjpeg-dev \
  libfreetype6-dev \
  libmcrypt-dev \
  libpq-dev \
  curl \
  gnupg \
  openssl \
  && docker-php-ext-install pdo_mysql mysqli \
  && docker-php-ext-configure gd --with-freetype --with-jpeg \
  && docker-php-ext-install -j$(nproc) gd \
  && apt-get clean \
  && rm -rf /var/lib/apt/lists/*

# Add php.ini
COPY php.ini /usr/local/etc/php/

# install stable node and latest npm
RUN curl -sL https://deb.nodesource.com/setup_18.x | bash - \
  && apt-get update \
  && apt-get install -y nodejs \
  && apt-get clean \
  && rm -rf /var/lib/apt/lists/* 
# install node packages
RUN npm install -g n \
  && n stable \
  && npm update -g npm