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

Route::get('/customer', 'CustomerController@index');
Route::post('/customer/add', 'CustomerController@add');
Route::get('/customer/edit/{id}', 'CustomerController@get');
Route::get('/customer/show/{id}', 'CustomerController@get');
Route::put('/customer/update/{id}', 'CustomerController@update');
Route::delete('/customer/delete/{id}', 'CustomerController@delete');
