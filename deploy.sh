#!/bin/bash

set -e

echo "Deploying..."
git pull origin main
php8.3 artisan down
php8.3 composer.phar install --no=dev --optimize-autoloader
php8.3 artisan migrate --force
php8.3 artisan config:cach
php8.3 artisan event:cach
php8.3 artisan route:cach
php8.3 artisan view:cach
php8.3 artisan up
echo "Done!"