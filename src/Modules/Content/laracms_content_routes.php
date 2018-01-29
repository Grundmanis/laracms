<?php

Route::group([
    'middleware' => ['web', 'laracms.auth'],
    'namespace'  => 'Grundmanis\Laracms\Modules\Content\Controllers',
    'prefix'     => 'laracms/content'
], function () {

    Route::get('/', 'ContentController@index')->name('laracms.content');
    Route::get('/create', 'ContentController@create')->name('laracms.content.create');
    Route::post('/create', 'ContentController@store');
    Route::get('/edit/{content}', 'ContentController@edit')->name('laracms.content.edit');
    Route::post('/edit/{content}', 'ContentController@update');
    Route::get('/delete/{content}', 'ContentController@destroy')->name('laracms.content.destroy');

});