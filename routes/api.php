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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::get('books/index', 'Api\ApiController@index');
Route::get('/books/{id}', 'Api\ApiController@show');
Route::post('/books/create', 'Api\ApiController@store')->middleware('auth:api');
Route::put('/books/{id}/edit', 'Api\ApiController@update')->middleware('auth:api');
Route::post('/books/upload', 'Api\ApiController@upload')->middleware('auth:api');
