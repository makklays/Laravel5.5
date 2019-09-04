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

// Новости
Route::get('/news', ['as' => 'all_news', 'uses' => 'NewsController@index']);
Route::get('/create-news', ['as' => 'create_news', 'uses' => 'NewsController@create']);
Route::post('/store-news', ['as' => 'store_news', 'uses' => 'NewsController@store']);
Route::post('/delete-news/{id}', ['as' => 'delete_news', 'uses' => 'NewsController@destroy'])->where(['id' => '[0-9]+']);
Route::get('/news/{slug}', ['as' => 'show_news', 'uses' => 'NewsController@show']);//->where(['slug' => '[A-Z0-9]+']);;

// Пользователи (загрузка из API)
Route::get('/upload-persons', 'PersonController@uploadPersons');

// получение списка книг
Route::get('/books', ['as' => 'all_books', 'uses' => 'BooksController@index']);
Route::get('/create-book', ['as' => 'create_book', 'uses' => 'BooksController@create']);
Route::post('/store-book', ['as' => 'store_book', 'uses' => 'BooksController@store']);
Route::get('/edit-book/{id}', ['as' => 'edit_book', 'uses' => 'BooksController@edit'])->where(['id' => '[0-9]+']);
Route::post('/update-book/{id}', ['as' => 'update_book', 'uses' => 'BooksController@update'])->where(['id' => '[0-9]+']);
Route::post('/delete-book/{id}', ['as' => 'delete_book', 'uses' => 'BooksController@destroy'])->where(['id' => '[0-9]+']);
Route::get('/book/{id}', ['as' => 'show_book', 'uses' => 'BooksController@show'])->where(['id' => '[0-9]+']);

// получение списка авторов
Route::get('/authors', ['as' => 'all_authors', 'uses' => 'AuthorsController@index']);
//Route::get('/create-author', ['as' => 'create_author', 'uses' => 'AuthorsController@create']);
//Route::post('/store-author', ['as' => 'store_author', 'uses' => 'AuthorsController@store']);
//Route::post('/delete-author/{id}', ['as' => 'delete_author', 'uses' => 'AuthorsController@destroy'])->where(['id' => '[0-9]+']);
Route::get('/author/{id}', ['as' => 'show_author', 'uses' => 'AuthorsController@show'])->where(['id' => '[0-9]+']);

//Auth::routes();

// Login
//Route::get('/login', ['as' => 'login', 'uses' => 'UserController@login']);
// Ragistration
//Route::get('/register', ['as' => 'register', 'uses' => 'UserController@register']);