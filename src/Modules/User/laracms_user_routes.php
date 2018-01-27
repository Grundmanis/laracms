<?php

Route::group([
    'middleware' => 'web',
    'namespace'  => 'Grundweb\Laracms\Modules\User\Controllers\Auth',
    'prefix'     => 'laracms'
], function () {

    Route::group([
        'middleware' => 'laracms.guest'
    ], function() {
        Route::get('login', 'LoginController@showLoginForm')->name('laracms.login');
        Route::post('login', 'LoginController@login');
    });

    Route::group([
        'middleware' => 'laracms.auth',
    ], function () {
        Route::get('logout', 'LoginController@logout')->name('laracms.logout');
    });

});