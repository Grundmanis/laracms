<?php

Route::group([
    'middleware' => ['web', 'laracms.auth'],
    'namespace'  => 'Grundmanis\Laracms\Modules\Pages\Controllers',
    'prefix'     => 'laracms/pages'
], function () {
    Route::get('/', 'PagesController@index')->name('laracms.pages');
    Route::get('/create', 'PagesController@create')->name('laracms.pages.create');
    Route::post('/create', 'PagesController@store');
    Route::get('/edit/{page}', 'PagesController@edit')->name('laracms.pages.edit');
    Route::post('/edit/{page}', 'PagesController@update');
    Route::get('/destroy/{page}', 'PagesController@destroy')->name('laracms.pages.destroy');
});

Route::group([
    'middleware' => ['web'],
    'namespace'  => 'Grundmanis\Laracms\Modules\Pages\Controllers',
], function () {

    Route::get('{url}', 'ShowPageController@url')->name('laracms.pages.url');

});