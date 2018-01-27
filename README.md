#Lara CMS
This is the Content Management System on Laravel 5.5

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