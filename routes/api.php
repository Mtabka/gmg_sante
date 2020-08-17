<?php

use Illuminate\Http\Request;

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

Route::group(['namespace' => 'Api'], function() {
    Route::group(['prefix' => 'user'], function () {
        Route::get('/all', 'UserController@index');
        Route::get('/{id}', 'UserController@show');
        Route::post('/store', 'UserController@store');
        Route::delete('/{id}', 'UserController@destroy');
    });
    Route::group(['prefix' => 'task'], function () {
        Route::get('/all', 'TaskController@index');
        Route::get('/{id}', 'TaskController@show');
        Route::post('/store', 'TaskController@store');
        Route::delete('/', 'TaskController@destroy');
    });
});
