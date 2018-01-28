#Lara CMS
This is the Content Management System on Laravel 5.5, made for fun.

<p align="center"><img src="https://drive.google.com/file/d/1JrBPlUS-5CvTDV-7EmVpe15BevzIjNZf/view?usp=drivesdk"></p>

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

## How to use
For now, main feature is to use translated texts from database in your blades. To do that, use
`Content::get($slug, $locale = null)` or helper `content($slug, $locale = null)`