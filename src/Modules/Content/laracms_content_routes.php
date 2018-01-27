<?php

Route::group([
    'middleware' => ['web', 'laracms.auth'],
    'namespace'  => 'Grundweb\Laracms\Modules\Content\Controllers',
    'prefix'     => 'laracms'
], function () {

    Route::get('content', 'ContentController@index')->name('laracms.content');
    Route::get('content/edit/{content}', 'ContentController@edit')->name('laracms.content.edit');

});