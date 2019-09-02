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
Route::post('/delete-news/{id}', ['as' => 'delete_news', 'uses' => 'NewsController@destroy'])->where(['id' => '[0-9]+']);;;
Route::get('/news/{slug}', ['as' => 'show_news', 'uses' => 'NewsController@show']);//->where(['slug' => '[A-Z0-9]+']);;

// Пользователи (загрузка из API)
Route::get('/upload-persons', 'PersonController@uploadPersons');