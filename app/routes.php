<?php

Route::group(['prefix' => 'items'], function()
{
    Route::get('/', 'ItemsController@listAll');
    Route::get('/{id}', 'ItemsController@show');
    Route::put('/{id}', 'ItemsController@update');
    Route::delete('/{id}', 'ItemsController@delete');
});

Route::group(['prefix' => 'lists'], function()
{
    Route::get('/', 'ListsController@listAll');
    Route::get('/{id}', 'ListsController@show');
    Route::post('/', 'ListsController@create');
    Route::put('/{id}', 'ListsController@update');
    Route::delete('/{id}', 'ListsController@delete');

    Route::post('/{id}/items', 'ItemsController@create');
});

App::error(function(\Bakeoff\Exceptions\ValidationFailed $e)
{
    return Response::make(400, $e->getErrors());
});