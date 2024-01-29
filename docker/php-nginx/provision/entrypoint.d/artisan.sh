#!/usr/bin/env bash

/usr/local/bin/php /app/artisan  route:cache
/usr/local/bin/php /app/artisan route:clear
/usr/local/bin/php /app/artisan view:clear
/usr/local/bin/php /app/artisan config:cache
/usr/local/bin/php /app/artisan config:clear
/usr/local/bin/php /app/artisan cache:clear

/usr/local/bin/php /app/artisan optimize



# to run artisan migrate

#/usr/local/bin/php /app/artisan migrate

