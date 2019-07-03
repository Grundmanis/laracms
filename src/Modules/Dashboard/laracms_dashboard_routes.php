<?php
Route::group([
    'middleware' => ['web', 'laracms.auth', 'laracms.language'],
    'namespace'  => 'Grundmanis\Laracms\Modules\Dashboard\Controllers',
    'prefix'     => 'laracms'
], function () {

    Route::get('/', 'DashboardController@index')->name('laracms.dashboard');

});