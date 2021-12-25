#!/usr/bin/env bash

composer install --no-interaction --no-ansi --optimize-autoloader --apcu-autoloader
rm -rf ~/.composer/cache/*
php artisan migrate --force
php artisan key:generate --force
php-fpm
