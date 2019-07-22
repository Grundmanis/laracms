<?php

Route::group([
    'middleware' => ['web', 'laracms.language'],
    'namespace'  => 'Grundmanis\Laracms\Modules\User\Controllers',
    'prefix'     => config('laracms.prefix'),
    'domain'     => config('laracms.domain')
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

        Route::group([
            'prefix' => 'users'
        ], function() {
            Route::get('/', 'UserController@index')->name('laracms.users');
            Route::get('create', 'UserController@create')->name('laracms.users.create');
            Route::post('create', 'UserController@store');
            Route::get('/edit/{user}', 'UserController@edit')->name('laracms.users.edit');
            Route::post('/edit/{user}', 'UserController@update');
            Route::get('/delete/{user}', 'UserController@destroy')->name('laracms.users.destroy');
        });

    });

});