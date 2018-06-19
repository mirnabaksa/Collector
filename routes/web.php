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
Route::get('/collector', 'PagesController@index')->name('home');
Route::get('collector/location', 'LocationController@index');
Route::get('collector/keyboard', 'KeyboardController@index');
Route::get('collector/audio', 'AudioController@index');
Route::get('collector/users', 'UserController@index');

Route::post('collector/location/store','LocationController@store');
Route::post('collector/keyboard/store','KeyboardController@store');
Route::post('collector/audio/store','AudioController@store');

Route::delete('collector/location/destroy/{id}','LocationController@destroy');
Route::delete('collector/keyboard/destroy/{id}','KeyboardController@destroy');
Route::delete('collector/audio/destroy/{id}','AudioController@destroy');
Route::delete('collector/users/destroy/{id}','UserController@destroy');
