<?php
Route::get('/', function()
{
    return 'Home Page Here';
});
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

    Route::post('/{id}/items', 'ItemsController@createAndAttach');
});

Route::group(['prefix' => 'categories'], function()
{
    Route::get('/', 'CategoriesController@listAll');
    Route::get('/{id}', 'CategoriesController@show');
    Route::post('/', 'CategoriesController@create');
    Route::put('/{id}', 'CategoriesController@update');
    Route::delete('/{id}', 'CategoriesController@delete');

    Route::post('/{id}/categories', 'CategoriesController@create');
});

App::error(function(\Bakeoff\Exceptions\ValidationFailed $e)
{
    return Response::make(400, $e->getErrors());
});