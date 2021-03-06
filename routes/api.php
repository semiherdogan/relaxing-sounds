<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('register', 'AuthController@register');
Route::post('login', 'AuthController@login');

Route::group(['middleware' => 'api_auth'], function () {
    //
    Route::post('logout', 'AuthController@logout');

    Route::get('categories', 'CategoriesController@index');

    Route::get('categories/{categoryId}', 'SoundsController@index');

    Route::prefix('favorites')->group(function () {
        //
        Route::get('/', 'FavoritesController@index');
        Route::post('/{soundId}', 'FavoritesController@store');
        Route::delete('/{soundId}', 'FavoritesController@delete');
    });
});
