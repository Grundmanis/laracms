<?php

Route::group([
    'middleware' => ['web', 'laracms.auth'],
    'namespace'  => 'Grundmanis\Laracms\Modules\Content\Controllers',
    'prefix'     => 'laracms'
], function () {

    Route::get('content', 'ContentController@index')->name('laracms.content');
    Route::get('content/create', 'ContentController@create')->name('laracms.content.create');
    Route::post('content/create', 'ContentController@store');
    Route::get('content/edit/{content}', 'ContentController@edit')->name('laracms.content.edit');
    Route::post('content/edit/{content}', 'ContentController@update');
    Route::get('content/delete/{content}', 'ContentController@destroy')->name('laracms.content.destroy');

});