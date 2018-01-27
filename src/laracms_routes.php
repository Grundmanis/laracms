<?php

Route::group([
    'middleware' => 'web',
    'namespace'  => 'Grundweb\Laracms\Modules',
    'prefix'     => 'laracms'
], function () {

    Route::group([
        'middleware' => 'laracms.guest'
    ], function() {
        Route::get('login', 'User\Controllers\Auth\LoginController@showLoginForm')->name('laracms.login');
        Route::post('login', 'User\Controllers\Auth\LoginController@login');
    });

    Route::group([
        'middleware' => 'laracms.auth',
    ], function () {
        Route::get('/', 'Dashboard\Controllers\DashboardController@index')->name('laracms');
        Route::get('logout', 'User\Controllers\Auth\LoginController@logout')->name('laracms.logout');

        Route::get('content', 'Content\Controllers\ContentController@index')->name('laracms.content');
        Route::get('content/edit/{content}', 'Content\Controllers\ContentController@edit')->name('laracms.content.edit');
    });

});