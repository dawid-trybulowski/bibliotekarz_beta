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

use Illuminate\Support\Facades\App;
App::setLocale('pl');
Route::get('/dashboard', 'DashboardController@index');
Route::get('/','BooksController@index');
Route::post('/reservation','BooksController@reservation');
Route::get('author/{author}','BooksController@getBooksByAuthor');
Route::get('genre/{genre}','BooksController@getBooksByGenre');
Route::get('search','BooksController@search');
Route::get('/logout','UserController@logout');
Route::view('/user/login-edit','user-dashboard-login-edit');
Route::post('/user/login-set','UserController@changeLoginData');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
