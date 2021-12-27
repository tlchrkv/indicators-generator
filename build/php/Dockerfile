FROM php:8.1.1-fpm-buster

RUN docker-php-ext-install -j$(nproc) opcache mysqli pdo_mysql
RUN mkdir /tmp/php-opcache && chmod -R 777 /tmp/php-opcache
RUN rm /usr/local/etc/php-fpm.d/www.conf /usr/local/etc/php-fpm.d/www.conf.default
COPY ./build/php/config/php.ini /usr/local/etc/php
COPY ./build/php/config/www.conf /usr/local/etc/php-fpm.d

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer && \
update-ca-certificates

WORKDIR /opt/app

RUN useradd --create-home --uid 1000 --user-group --system app
USER app

COPY --chown=app:app ./build/php/entrypoint.sh /home/app/entrypoint.sh

CMD /home/app/entrypoint.sh
