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


Route::get('/', 'UrlController@index')->name('index');
Route::post('/url', 'UrlController@url')->name('url');
Route::get('/view/{code}', 'UrlController@urlData')->name('url_data');
Route::get('/{code}', 'UrlController@code')->name('code');



