# Lara CMS
This is the Content Management System on Laravel 5.5, made for fun.

![alt text](http://screenshotlink.ru/c2b436b8225743cce450feebe8221fd2.png//url/to/img.png)

## Installation
* Register service provider `Grundweb\Laracms\LaracmsServiceProvider::class` in `config/app.php` providers array
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
            'model' => \Grundweb\Laracms\Modules\User\LaracmsUser::class,
        ],
```
## How to use
For now, main feature is to use translated texts from database in your blades. To do that, use
`Content::get($slug, $locale = null)` or helper `content($slug, $locale = null)`