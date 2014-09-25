<?php

Route::group(['prefix' => 'lists'], function()
{
    Route::get('/{id}', 'ItemsController@show');
    Route::post('/', 'ItemsController@create');
    Route::put('/{id}', 'ItemsController@update');
    Route::delete('/{id}', 'ItemsController@delete');
});

Route::group(['prefix' => 'lists'], function()
{
    Route::get('/', 'ListsController@listAll');
    Route::get('/{id}', 'ListsController@showList');
    Route::post('/', 'ListsController@createList');
    Route::post('/{id}', 'ListsController@update');
    Route::put('/{id}', 'ListsController@overwrite');
    Route::delete('/{id}', 'ListsController@delete');
});