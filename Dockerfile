FROM php:8.2-cli-alpine

RUN docker-php-ext-install pcntl && \
    curl -L https://github.com/composer/composer/releases/download/2.3.5/composer.phar -o /usr/bin/composer && \
    chmod +x /usr/bin/composer

WORKDIR /app

COPY composer.json composer.lock ./
RUN composer install --no-dev --optimize-autoloader --no-ansi --no-interaction --no-progress
COPY .. .

EXPOSE 8080

CMD ["php", "app.php"]
