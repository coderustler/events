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

Route::get('events', 'EventsController@index');
Route::get('events/{date}', 'EventsController@create');
Route::post('events/{id}', 'EventsController@update')->name('update');

Route::resource('events', 'EventsController');
