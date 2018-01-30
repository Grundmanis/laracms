<?php

Route::group([
    'middleware' => ['web', 'laracms.auth'],
    'namespace'  => 'Grundmanis\Laracms\Modules\Pages\Controllers',
    'prefix'     => 'laracms/pages'
], function () {

    Route::get('/', 'PagesController@index')->name('laracms.pages');
    Route::get('/create', 'PagesController@create')->name('laracms.pages.create');

});