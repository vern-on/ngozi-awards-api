FROM php:7.4.7-fpm

RUN apt-get update && apt-get install -y nano libxml2-dev libzip-dev libpng-dev libjpeg-dev
RUN docker-php-ext-install pdo_mysql bcmath xml zip gd intl
RUN docker-php-ext-configure gd --with-jpeg 

RUN pecl install -o -f redis \
&&  rm -rf /tmp/pear \
&&  docker-php-ext-enable redis

COPY ./entrypoint.sh /opt/bin/entrypoint.sh
RUN chmod +x /opt/bin/entrypoint.sh

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer


# Change current user to www
USER 1000:1000

CMD ["/opt/bin/entrypoint.sh"]