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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', 'MovieController@index');

Route::get('/admin/create', ['uses' => 'MovieController@create', 'as' => 'movie.create']);
Route::post('/admin/create', ['uses' => 'MovieController@store', 'as' => 'movie.store']);

Route::get('/admin/edit/{id}', ['uses' => 'MovieController@edit', 'as' => 'movie.edit']);