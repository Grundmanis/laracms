# Lara CMS
This is the Content Management System on Laravel 5.5, made for fun.
For now, main feature is to use translated texts directly from database in your blades and 
manage them in laracms dashboard.

![larcms dashboard](https://user-images.githubusercontent.com/6103997/35483971-5b6cace2-0451-11e8-8d35-c93733dd3736.gif)

## How to use
LaraCMS link: `yourhost.com/laracms`
Test user (But seed first):
```
login: admin@laracms.com
password: secret
```

In blade files, use `Content::get($slug, $locale = null)` or helper `content($slug, $locale = null)`

## Installation
In `config/app.php` **providers** array register laracms service provider:
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
    'provider' => 'laracms_users',
],
``` 
and a new provider:
```
'laracms_users' => [
    'driver' => 'eloquent',
    'model' => \Grundmanis\Laracms\Modules\User\Models\LaracmsUser::class,
],
```
## Seeder
```
php artisan db:seed --class=Grundmanis\\Laracms\\Modules\\User\\LaracmsUserSeeder
```