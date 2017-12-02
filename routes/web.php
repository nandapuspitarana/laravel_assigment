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
//create data
Route::get('/admin/create', ['uses' => 'MovieController@create', 'as' => 'movie.create']);
Route::post('/admin/create', ['uses' => 'MovieController@store', 'as' => 'movie.store']);
//update data
Route::get('/admin/edit/{id}', ['uses' => 'MovieController@edit', 'as' => 'movie.edit']);
Route::put('/admin/update/{id}', ['uses' => 'MovieController@update', 'as' => 'movie.update']);
//delete data
Route::delete('/movie/destroy/{id}',['uses' => 'MovieController@destroy', 'as' => 'movie.destroy']);
//search data
Route::get('/admin/search', ['as' => 'movie.search', 'uses' => 'MovieController@search']);

//category data
Route::get('/admin/category', 'MovieController@indexCategory');
//Category Create Data
Route::get('/admin/category/create', ['uses' => 'MovieController@createCategory', 'as' => 'movie.createCategory']);