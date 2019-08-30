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
Route::get('/', 'IndexController@root');
Route::get('/whisper', 'WhispersController@index')->name('whisper');
Route::get('/leacots', 'LeacotsController@index')->name('leacots');
Route::get('/album', 'AlbumsController@index')->name('album');
Route::get('/about', 'AboutsController@index')->name('about');
