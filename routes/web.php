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
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Http\Request;

Route::get('/', 'BooksController@index');

Route::get('/login','UserController@login')->name('login');
Route::post('/login','UserController@doLogin');
Route::get('/logout','UserController@logout')->name('logout');
Route::get('/register','UserController@register')->name('register');
Route::post('/register','UserController@doRegister');

Route::get('/books/create', 'BooksController@create')->middleware('auth')->name('book.create');
Route::post('/books/create', 'BooksController@store')->middleware('auth')->name('book.store');
Route::get('/books/index', 'BooksController@index')->name('book.index');
Route::get('/books/{id}', 'BooksController@show')->name('book.show');
Route::get('/books/{id}/edit', 'BooksController@edit')->middleware('auth')->name('book.edit');
Route::put('/books/{id}/edit', 'BooksController@update')->middleware('auth')->name('book.update');

Route::get('/authors/create', 'AuthorsController@create')->middleware('auth')->name('author.create');
Route::post('/authors/create', 'AuthorsController@store')->middleware('auth')->name('author.store');
Route::get('/authors/index', 'AuthorsController@index')->name('author.index');
Route::get('/authors/{id}', 'AuthorsController@show')->name('author.show');
Route::get('/authors/{id}/edit', 'AuthorsController@edit')->middleware('auth')->name('author.edit');
Route::put('/authors/{id}/edit', 'AuthorsController@update')->middleware('auth')->name('author.update');

Route::get('/categories/create', 'CategoriesController@create')->middleware('auth')->name('category.create');
Route::post('/categories/create', 'CategoriesController@store')->middleware('auth')->name('category.store');
Route::get('/categories/index', 'CategoriesController@index')->name('category.index');
Route::get('/categories/{id}', 'CategoriesController@show')->name('category.show');
Route::get('/categories/{id}/edit', 'CategoriesController@edit')->middleware('auth')->name('category.edit');
Route::put('/categories/{id}/edit', 'CategoriesController@update')->middleware('auth')->name('category.update');
