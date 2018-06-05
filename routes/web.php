<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/location', 'LocationController@index');
Route::get('/keyboard', 'KeyboardController@index');
Route::get('/audio', 'AudioController@index');
Route::get('/users', 'UserController@index');

Route::post('/location/store','LocationController@store');
Route::post('/keyboard/store','KeyboardController@store');
Route::post('/audio/store','AudioController@store');

Route::delete('/location/destroy/{id}','LocationController@destroy');
Route::delete('/keyboard/destroy/{id}','KeyboardController@destroy');
Route::delete('/audio/destroy/{id}','AudioController@destroy');
Route::delete('/users/destroy/{id}','UserController@destroy');