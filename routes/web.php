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

/*-------------Login Form----------------*/
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
/*---------------------------------------*/

/*-------------Login Action----------------*/
Route::post('/login', 'Auth\LoginController@login')->name('login.verify');
/*---------------------------------------*/

/*-------------Logout Form----------------*/
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
/*---------------------------------------*/

/*-------------Register Form----------------*/
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
Route::get('/genres', 'GenreController@index')->name('genres.all');
Route::get('/genres/insert', 'GenreController@insert')->name('genres.insert');
Route::get('/genres/edit/{id}', 'GenreController@edit')->name('genres.edit');
/*----------------------------------------*/

/*-------------Genre Actions----------------*/
Route::post('/genres/insert', 'GenreController@store')->name('genres.insert.verify');
Route::post('/genres/edit/{id}', 'GenreController@update')->name('genres.edit.verify');
Route::delete('/genres/delete/{id}', 'GenreController@delete')->name('genres.delete.verify');
/*------------------------------------------*/

/*-------------Author Forms----------------*/
Route::get('/authors', 'AuthorController@index')->name('authors.insert');
Route::get('/authors/insert', 'AuthorController@insert')->name('authors.edit');
Route::get('/authors/edit/{id}', 'AuthorController@edit')->name('authors.delete');
/*-----------------------------------------*/

/*-------------Author Actions----------------*/
Route::post('/authors/insert', 'AuthorController@store')->name('authors.insert.verify');
Route::post('/authors/edit/{id}', 'AuthorController@update')->name('authors.edit.verify');
Route::delete('/authors/delete/{id}', 'AuthorController@delete')->name('authors.delete.verify');
/*-------------------------------------------*/

