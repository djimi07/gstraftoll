FROM webdevops/php-nginx:8.2-alpine

ENV WEB_DOCUMENT_ROOT=/app/public
ENV PHP_DISMOD=bz2,calendar,exiif,ffi,intl,gettext,ldap,mysqli,imap,pdo_pgsql,pgsql,soap,sockets,sysvmsg,sysvsm,sysvshm,shmop,xsl,zip,gd,apcu,vips,yaml,imagick,mongodb,amqp
WORKDIR /app

RUN apk update && apk add git
RUN apk update && apk add zip
#RUN apk update && apk add opcache -y
RUN docker-php-ext-install opcache
COPY composer* ./


ENV COMPOSER_ALLOW_SUPERUSER=1

RUN set -eux;

RUN composer install \
  --no-dev \
  --no-interaction \
  --prefer-dist \
  --ignore-platform-reqs \
  --optimize-autoloader \
  --apcu-autoloader \
  --ansi \
  --no-scripts \
  --audit



RUN set -eux \
    & apk add \
        --no-cache \
        nodejs \
        yarn


RUN mkdir -p /app/storage/fonts
#RUN chmod -R 777 /app/public/fonts
#RUN chmod -R 777 /app/fonts
COPY . .


RUN yarn install

RUN yarn production


COPY docker/php-nginx /opt/docker


ENV PHP_OPCACHE_VALIDATE_TIMESTAMPS="0"
COPY docker/opcache.ini "$PHP_INI_DIR/conf.d/opcache.ini"

# Ensure all of our files are owned by the same user and group.
RUN chown -R application:application .
