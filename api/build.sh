#!/bin/bash

# Copy .env.production to .env
cp .env.production .env

# Install Composer dependencies
composer install --no-dev --optimize-autoloader

# Clear and cache configuration
php artisan config:clear
php artisan config:cache

# Ensure storage directory is writable
chmod -R 777 storage bootstrap/cache
