# About laravel-template

## setup project
 - ``composer create-project laravel/laravel:^10 laravel-template``
 - ``cd laravel-template``
 - ``composer require laravel/breeze --dev``
 - ``php artisan breeze:install``
 - ``npm install``
 - ``composer require pacificdev/laravel_9_preset``
 - ``php artisan preset:ui bootstrap --auth``

### fix sass deprecation warning
 - ``npm i sass@1.77.6 --save-exact``

## AdminLte package
 - ``composer require jeroennoten/laravel-adminlte``
 - ``php artisan adminlte:install``

### Authentication style views
 - ``php artisan adminlte:install --only=auth_views``

## Changes for users table and model
 - ``composer require intervention/image-laravel``
 - add fields: *surname*, *active*, *image*, *level*, *last_login*, *note* and sofdelete
 - add users seeder
 - changes to *app\Http\Request\Auth\LoginRequest.php@authenticate* to add support for inactive users and updating for new field *last_login*
 - add language item for disabled account message
 - add folder *profiles* to *storage\app* for user's avatar

## Use AdminLte views and layout
 - ``php artisan storage:link``
 - ``php artisan adminlte:install --only=main_views``
 - add folder *images* to *storage\app\public* for app logo on auth views
 - add folder *login* to *storage\app\public\images* for random images on auth views
 - add new route for random image on auth views
 - add new route for profile image and update *ProfileController.php*
 - add *public/font* folder 