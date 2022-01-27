```bash
composer require tymon/jwt-auth:*
php artisan vendor:publish
php artisan make:controller Api/Auth/LoginController
php artisan make:middleware IsAdmin
```
