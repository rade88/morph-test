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

Route::group([
	'prefix' => 'post',
], function () {
	Route::get('/', '\App\Http\Controllers\PostController@index');
	Route::post('/', '\App\Http\Controllers\PostController@store');
	Route::patch('/{post}', '\App\Http\Controllers\PostController@update');
	Route::delete('/{post}', '\App\Http\Controllers\PostController@destroy');
});
