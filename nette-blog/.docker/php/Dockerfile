FROM php:7.4-fpm-buster

ARG USER=1000
ARG PROJECT_NAME

# Poznámky:
#
# dpkg: error: error creating new backup file '/var/lib/dpkg/status-old': Invalid cross-device link
# https://gist.github.com/Francesco149/ce376cd83d42774ed39d34816b9e21db
# Na hostovi spustit:
# $ echo N | sudo tee /sys/module/overlay/parameters/metacopy

RUN docker-php-source extract \
&& apt-get update \
&& apt-get install -y \
	libicu-dev \
	libfreetype6-dev \
	libjpeg62-turbo-dev \
	libpng-dev \
    libxml2-dev \
    libzip-dev \
    libgmp-dev \
    libmagickwand-dev \
    gettext-base \
    wget \
    git \
    unzip \
    supervisor \
    syslog-ng \
    sudo \
    unixodbc-dev \
    gnupg \
    apt-transport-https
RUN adduser -u $USER $PROJECT_NAME \
&& echo "${PROJECT_NAME} ALL=(root) NOPASSWD:/usr/sbin/service" > /etc/sudoers.d/$PROJECT_NAME \
&& chmod 0440 /etc/sudoers.d/$PROJECT_NAME
RUN docker-php-ext-install gmp opcache soap zip intl pdo_mysql calendar bcmath \
&& apt-get install -y libfreetype6-dev libjpeg62-turbo-dev libpng-dev && docker-php-ext-configure gd --with-freetype --with-jpeg && docker-php-ext-install gd \
&& curl https://packages.microsoft.com/keys/microsoft.asc | apt-key add - && curl https://packages.microsoft.com/config/debian/10/prod.list > /etc/apt/sources.list.d/mssql-release.list && apt-get update && ACCEPT_EULA=Y apt-get install -y msodbcsql17 \
&& pecl install imagick sqlsrv-5.9.0 pdo_sqlsrv-5.9.0 uopz-6.1.2 \
&& wget https://raw.githubusercontent.com/composer/getcomposer.org/d3e09029468023aa4e9dcd165e9b6f43df0a9999/web/installer -O - -q | php -- --quiet && mv composer.phar /usr/local/bin/composer \
&& curl -sOL https://gordalina.github.io/cachetool/downloads/cachetool-7.0.0.phar && chmod +x cachetool-7.0.0.phar && mv cachetool-7.0.0.phar /usr/local/bin/cachetool \
&& curl -sO https://git.appsdevteam.com/adt/sendmail/raw/v2.0/bin/sendmail && chmod +x sendmail && mv sendmail /usr/local/bin/sendmail && pecl install redis mailparse \
&& docker-php-source delete \
&& sed -i -E 's/(CipherString\s*=\s*DEFAULT@SECLEVEL=)2/\11/' /etc/ssl/openssl.cnf
