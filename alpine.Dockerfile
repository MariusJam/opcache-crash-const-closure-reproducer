# reproducer/Dockerfile
FROM php:8.5-fpm-alpine

# Install strace for debugging
RUN apk add --no-cache strace

# Configure OPCache and Preloading
RUN { \
    echo 'opcache.enable=1'; \
    echo 'opcache.enable_cli=1'; \
    echo 'opcache.preload=/srv/reproducer/preload.php'; \
    echo 'opcache.preload_user=www-data'; \
    echo 'opcache.error_log=/proc/self/fd/2'; \
} > /usr/local/etc/php/conf.d/docker-php-ext-opcache.ini

WORKDIR /srv/reproducer
COPY . .

# We use a simple script to trigger the crash via CLI to make it easier to reproduce
# but it would be the same via FPM/Web.
CMD ["strace", "-f", "php", "index.php"]
