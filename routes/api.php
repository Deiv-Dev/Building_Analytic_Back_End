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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/all', 'App\Http\Controllers\AuthController@all');
Route::post('/login', 'App\Http\Controllers\AuthController@login');
Route::delete('/logout', 'App\Http\Controllers\AuthController@logout');
Route::post('/newtoken', 'App\Http\Controllers\AuthController@newtoken'); //test
Route::post('/register', 'App\Http\Controllers\AuthController@register');

Route::post('/worker', 'App\Http\Controllers\WorkerController@create');

Route::post('/client', 'App\Http\Controllers\ClientController@create');
Route::get('/allclients', 'App\Http\Controllers\ClientController@show');

Route::post('/job', 'App\Http\Controllers\JobController@create');

Route::post('/workerpayments', 'App\Http\Controllers\WorkerPayController@create');
Route::get('/all', 'App\Http\Controllers\WorkerPayController@show');
//Route::middleware('auth:api')->get('/create', 'App\Http\Controllers\AuthController@create');