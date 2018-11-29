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

/*-------------Book Forms----------------*/
Route::get('/books', 'BookController@index');
Route::get('books/{id}', 'BookController@show');
Route::get('/books/insert', 'BookController@create');
Route::get('/books/edit/{id}', 'BookController@edit');
/*---------------------------------------*/

/*-------------Book Actions----------------*/
Route::post('/books/insert', 'BookController@store');
Route::put('/books/edit/{id}', 'BookController@update');
Route::delete('/books/delete/{id}', 'BookController@delete');
/*-----------------------------------------*/

/*-------------Genre Forms----------------*/
Route::get('/genres', 'GenreController@index');
Route::get('/genres/insert', 'GenreController@insert');
Route::get('/genres/edit/{id}', 'GenreController@edit');
/*----------------------------------------*/

/*-------------Genre Actions----------------*/
Route::post('/genres/insert', 'GenreController@store');
Route::put('/genres/edit/{id}', 'GenreController@update');
Route::delete('/genres/delete/{id}', 'GenreController@delete');
/*------------------------------------------*/

/*-------------Author Forms----------------*/
Route::get('/authors', 'AuthorController@index');
Route::get('/authors/insert', 'AuthorController@insert');
Route::get('/authors/edit/{id}', 'AuthorController@edit');
/*-----------------------------------------*/

/*-------------Author Actions----------------*/
Route::post('/authors/insert', 'AuthorController@store');
Route::put('/authors/edit/{id}', 'AuthorController@update');
Route::delete('/authors/delete/{id}', 'AuthorController@delete');
/*-------------------------------------------*/

