#Lara CMS
This is the Content Management System on Laravel 5.5, made for fun.

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
* To use `Content::get()` in your blade files, register new alias in `config/app.php` aliases array:
```
'Content' => Grundweb\Laracms\Modules\Content\Facades\ContentFacade::class
```
Otherwise, You can just use helper `content($slug)` in your blade files.