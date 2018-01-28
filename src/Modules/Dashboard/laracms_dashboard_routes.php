<?php

Route::group([
    'middleware' => ['web', 'laracms.auth'],
    'namespace'  => 'Grundmanis\Laracms\Modules\Dashboard\Controllers',
    'prefix'     => 'laracms'
], function () {

    Route::get('/', 'DashboardController@index')->name('laracms');

});