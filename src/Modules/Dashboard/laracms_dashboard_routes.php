<?php
Route::group([
    'middleware' => ['web', 'laracms.auth'],
    'namespace'  => 'Grundmanis\Laracms\Modules\Dashboard\Controllers',
    'prefix'     => 'laracms/dashboard'
], function () {

    Route::get('/', 'DashboardController@index')->name('laracms.dashboard');

});