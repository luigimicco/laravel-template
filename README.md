# About laravel-template

## setup project
 - composer create-project laravel/laravel:^10 laravel-template
 - cd laravel-template
 - composer require laravel/breeze --dev
 - php artisan breeze:install
 - npm install
 - composer require pacificdev/laravel_9_preset
 - php artisan preset:ui bootstrap --auth

### fix sass deprecation warning
 - npm i sass@1.77.6 --save-exact
