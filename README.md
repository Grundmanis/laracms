# Lara CMS - Laravel Content Management System
This is the Content Management System on Laravel 5.5, made for fun.

![laravel](https://user-images.githubusercontent.com/6103997/35647123-3fa8b218-06da-11e8-9cf8-6e7ddd7296d6.png)
## How to use

### Dashboard
Link to laracms dashboard: 
```
yourhost.com/laracms
```
Test user (But run seeder first):
```
login: admin@laracms.com
password: secret
```

Publish config file which stores dashboard menu points, you can add your own too:
```
php artisan vendor:publish --tag=laracms

```

### Modules
You can write your own modules for laracms, check <a href="https://github.com/Grundmanis/laracms/tree/master/src/Modules">Modules</a> folder,
or check already created by me separate module - <a href="https://github.com/Grundmanis/laracms-content">Content Module</a>

### User module
Simple module which allows to CRUD cms users

### Content module
This module allows to use translated texts directly from database in your blade files and 
manage them in laracms dashboard.

Click on "content" menu point or go to `yourhost.com/laracms/content/`, create a new content with unique slug and translated values,
then in blade files, use `Content::get($slug, $locale = null)` or helper `content($slug, $locale = null)`

### Pages module
This module allows to create a new pages with urls for your website.

Publish page layouts to make available to modify them
```
php artisan vendor:publish --tag=laracms_pages

```
Then `resources/views/laracms/pages/layouts` will appear with 2 already created layouts, 
You can create your own layouts in this folder and they will be automatically grabbed by laracms.

Click on "pages" menu point or go to `yourhost.com/laracms/pages/`, create a new page by using unique URL, choose layout and
type some text. Now, You can see your page: `yourhost.com/whatever_created_page_slug_here`

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
Run migration:
``` 
php artisan migrate
```
and run seeder:
```
php artisan db:seed --class=Grundmanis\\Laracms\\Modules\\User\\LaracmsUserSeeder
```