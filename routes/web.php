<?php

use Illuminate\Support\Facades\Route;

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

Route::view('/', 'auth.login');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', 'ProfileController@dashboard')->name('dashboard');
Route::get('/profile', 'ProfileController@index')->name('profile.index');


// books urls
Route::get('/book', 'BookController@index')->name('book.index'); //all books
Route::get('/trash', 'BookController@trash')->name('book.trash'); //all books
Route::get('/createbook', 'BookController@create')->name('book.create');
Route::post('/book', 'BookController@store')->name('book.store');
Route::get('/book/{book}', 'BookController@show')->name('book.show');
Route::get('/book/{book}/edit', 'BookController@edit')->name('book.edit');
Route::put('/book/{book}/edit', 'BookController@update')->name('book.update');
Route::delete('/book/{book}', 'BookController@destroy')->name('book.destroy');
Route::delete('/trash/{book}', 'BookController@clear')->name('book.clear');//forcedelete

// trash
