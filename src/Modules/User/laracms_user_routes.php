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
        Route::get('login', 'Auth\LaracmsLoginController@showLoginForm')->name('laracms.login');
        Route::post('login', 'Auth\LaracmsLoginController@login');
    });

    Route::group([
        'middleware' => 'laracms.auth',
    ], function () {
        Route::get('logout', 'Auth\LaracmsLoginController@logout')->name('laracms.logout');

        Route::group([
            'prefix' => 'users'
        ], function() {
            Route::get('/', 'LaracmsUserController@index')->name('laracms.users');
            Route::get('create', 'LaracmsUserController@create')->name('laracms.users.create');
            Route::post('create', 'LaracmsUserController@store');
            Route::get('/edit/{user}', 'LaracmsUserController@edit')->name('laracms.users.edit');
            Route::post('/edit/{user}', 'LaracmsUserController@update');
            Route::get('/delete/{user}', 'LaracmsUserController@destroy')->name('laracms.users.destroy');
        });

    });

});