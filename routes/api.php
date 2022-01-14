<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/dogs', 'App\Http\Controllers\DogApiController@index');
Route::post('/dogs', 'App\Http\Controllers\DogApiController@store');
Route::get('/dogs/{id}', 'App\Http\Controllers\DogApiController@show');
Route::put('/dogs/{id}', 'App\Http\Controllers\DogApiController@update');
Route::delete('/dogs/{id}', 'App\Http\Controllers\DogApiController@destroy');
