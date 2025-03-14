#!/bin/bash

# Copy .env.production to .env
cp .env.production .env

# Install dependencies
composer install --no-dev --optimize-autoloader

# Generate key (if not already set)
php artisan key:generate --force

# Clear and cache configuration
php artisan config:clear
php artisan config:cache

# Cache routes
php artisan route:clear
php artisan route:cache

# Cache views
php artisan view:clear
php artisan view:cache

# Create storage link
php artisan storage:link

# Set permissions
chmod -R 777 storage bootstrap/cache
