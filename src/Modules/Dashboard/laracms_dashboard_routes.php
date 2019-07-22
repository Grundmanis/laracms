<?php
Route::group([
    'middleware' => ['web', 'laracms.auth', 'laracms.language'],
    'namespace'  => 'Grundmanis\Laracms\Modules\Dashboard\Controllers',
    'prefix'     => config('laracms.prefix', 'laracms'),
    'domain'     => config('laracms.domain')
], function () {

    Route::get('/', 'DashboardController@index')->name('laracms.dashboard');

});