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

/*-------------Login----------------*/
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
/*---------------------------------------*/

/*-------------Login Action----------------*/
Route::post('/login', 'Auth\LoginController@login')->name('login.verify');
/*---------------------------------------*/

/*-------------Register----------------*/
Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
/*---------------------------------------*/

/*-------------Register Action----------------*/
Route::post('/register', 'Auth\RegisterController@register')->name('register.verify');
/*---------------------------------------*/

/*-------------Cart----------------*/
Route::get('/cart', 'CartController@index')->name('cart');
/*---------------------------------------*/

/*-------------Book Forms----------------*/
Route::get('/', 'BookController@index')->name('books.all');
Route::get('/books/insert', 'BookController@insert')->name('books.insert');
Route::get('/books/edit/{id}', 'BookController@edit')->name('books.edit');
Route::get('/books/{id}', 'BookController@show')->name('books.detail');
/*---------------------------------------*/

/*-------------Book Actions----------------*/
Route::post('/books/insert', 'BookController@store')->name('books.insert.verify');
Route::post('/books/edit', 'BookController@update')->name('books.edit.verify');
Route::delete('/books/delete/{id}', 'BookController@delete')->name('books.delete.verify');
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

