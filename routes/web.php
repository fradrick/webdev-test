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

Route::get('/', 'HomeController@index');
Route::get('persons/data', 'PersonsController@data');
Route::delete('attributes/{id}', 'PersonsController@destroy_attribute');
Route::resource('persons', 'PersonsController');
