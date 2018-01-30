# Lara CMS
This is the Content Management System on Laravel 5.5, made for fun.
For now, main feature is to use translated texts directly from database in your blades and 
manage them in laracms dashboard.

![laracms dashboard](https://user-images.githubusercontent.com/6103997/35482156-c64ad344-0439-11e8-9972-db1f9c9c89b4.png)

## How to use
Link to laracms dashboard: 
```
yourhost.com/laracms
```
Test user (But run seeder first):
```
login: admin@laracms.com
password: secret
```

In blade files, use `Content::get($slug, $locale = null)` or helper `content($slug, $locale = null)`

## Installation
Run 
```
composer require grundmanis/laracms
```
Then in `config/app.php` **providers** array register laracms service provider:
```
Grundmanis\Laracms\LaracmsServiceProvider::class
``` 
and if You are not using yet the <a href="https://github.com/dimsav/laravel-translatable">Dimsav\Translatable</a> package, register it as well: 
``` 
Dimsav\Translatable\TranslatableServiceProvider::class
```
For authentication in dashboard, in `config/auth.php` add a new guard:
```
'laracms' => [
    'driver' => 'session',
    'provider' => 'laracms_users'
]
``` 
and a new provider:
```
'laracms_users' => [
    'driver' => 'eloquent',
    'model' => \Grundmanis\Laracms\Modules\User\Models\LaracmsUser::class
]
```
## Seeder
```
php artisan db:seed --class=Grundmanis\\Laracms\\Modules\\User\\LaracmsUserSeeder
```

## Publish
For now, You can publish only config file which stores dashboard menu points
```
php artisan vendor:publish --tag=laracms

```