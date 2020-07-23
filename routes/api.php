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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/initial', 'BurgerController@initial');
//Route::get('/orders', 'BurgerController@orders');
Route::middleware('auth:api')->get('/orders', 'BurgerController@orders');
Route::middleware('auth:api')->post('/store', 'BurgerController@store');
Route::post('/login', 'UserController@login');
Route::post('/register', 'UserController@register');


