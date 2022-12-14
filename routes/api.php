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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('register', 'Api\AuthController@register');
Route::post('login', 'Api\AuthController@login');

// Route::group(['middleware' => 'auth:api'], function () {
//     Route::get('logout', 'Api\AuthController@logout');

    // Kost
    Route::get('kost', 'Api\KostController@index');
    Route::get('kost/{id}', 'Api\KostController@show');
    Route::post('kost', 'Api\KostController@store');
    Route::put('kost/{id}', 'Api\KostController@update');
    Route::delete('kost/{id}', 'Api\KostController@destroy');
// });