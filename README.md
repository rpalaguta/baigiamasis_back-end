This is a back end part of my project for CodeAcademy. Here I've used Laravel to make an API that is used in the front end.    

To launch this project you need PHP 8.0.2, Laravel 8 and Docker
comman sequence to launch:
    1. composer install
    2. wsl
    3. ./vendor/bin/sail up -d
    4. ./vendor/bin/sail bash
    5. php artisan migrate:fresh --seed