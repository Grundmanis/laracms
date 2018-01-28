<?php

Route::group([
    'middleware' => 'web',
    'namespace'  => 'Grundweb\Laracms\Modules\User\Controllers',
    'prefix'     => 'laracms'
], function () {

    Route::group([
        'middleware' => 'laracms.guest'
    ], function() {
        Route::get('login', 'Auth\LoginController@showLoginForm')->name('laracms.login');
        Route::post('login', 'Auth\LoginController@login');
    });

    Route::group([
        'middleware' => 'laracms.auth',
    ], function () {
        Route::get('logout', 'Auth\LoginController@logout')->name('laracms.logout');
    });

    Route::group([
       'prefix' => 'users'
    ], function() {
        Route::get('/', 'UserController@index')->name('laracms.users');
    });

});