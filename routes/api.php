<?php

use Illuminate\Http\Request;
use App\Persons;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

// Публичный API - отдает пользователей по url
Route::get('persons', 'PersonController@getPersons'); // by 100 persons
Route::get('all-persons', ['uses' => 'PersonController@getAllPersons']); // all
