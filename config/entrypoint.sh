#!/bin/bash

php-fpm --daemonize

# Run scheduler
while [ true ]
do
  php artisan schedule:run --no-interaction
  sleep 60
done