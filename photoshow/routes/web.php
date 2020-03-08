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

/**
 * Albums
 */
Route::get('/', 'AlbumsController@index');

Route::get('/albums', 'AlbumsController@index');

Route::get('/albums/create', 'AlbumsController@create');

Route::get('/albums/{id}', 'AlbumsController@show');

Route::post('/albums/create', 'AlbumsController@store');


/**
 * Photos
 */
Route::get('/photos/create/{album_id}', 'PhotosController@create');

Route::post('/photos/store', 'PhotosController@store');
