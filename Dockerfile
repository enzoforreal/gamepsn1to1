FROM php:8.1-apache
ARG DEBIAN_FRONTEND=noninteractive
COPY --from=composer /usr/bin/composer /usr/bin/composer
RUN apt update && apt install libyaml-dev libjpeg-dev libpng-dev zip unzip -y
RUN docker-php-ext-install pdo pdo_mysql gd
RUN docker-php-ext-configure gd --with-jpeg
RUN pecl install yaml \
        && docker-php-ext-enable yaml pdo pdo_mysql gd
RUN a2enmod rewrite
WORKDIR /var/www/gamepsn1to1/website
COPY  /website .
RUN sed -i '/<Directory \/var\/www\/>/,/<\/Directory>/ s/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf
RUN a2enmod ssl
RUN composer install
RUN service apache2 restart
CMD apachectl -D FOREGROUND
