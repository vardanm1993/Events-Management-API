# Events-Management-REST-API
The REST API Events Management App with Laravel 10

# step 1

copy .env.example .env

# step 2

composer install

# step 3

./vendor/bin/sail  up -d

# step 4

./vendor/bin/sail  artisan key:generate

# step 5

./vendor/bin/sail  artisan migrate

# step 5

./vendor/bin/sail  artisan app:send-event-reminders  or ./vendor/bin/sail  artisan  schedule:work

# step 6

./vendor/bin/sail  artisan queue:work

# step 7
http://localhost  
mailpit - http://localhost:8025
