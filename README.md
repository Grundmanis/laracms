# Lara CMS
This is the Content Management System on Laravel 5.5, made for fun.

![larcms dashboard](https://user-images.githubusercontent.com/6103997/35482156-c64ad344-0439-11e8-9972-db1f9c9c89b4.png)

## Installation
* Register service provider `Grundmanis\Laracms\LaracmsServiceProvider::class` in `config/app.php` providers array
* Add new guard in `config/auth.php`: 
```
'laracms' => [
            'driver' => 'session',
            'provider' => 'laracms_users',
        ],
``` 
* And add a new auth provider in `config/auth.php`:
```
    'laracms_users' => [
            'driver' => 'eloquent',
            'model' => \Grundmanis\Laracms\Modules\User\Models\LaracmsUser::class,
        ],
```
## How to use
For now, main feature is to use translated texts from database in your blades. To do that, use
`Content::get($slug, $locale = null)` or helper `content($slug, $locale = null)`