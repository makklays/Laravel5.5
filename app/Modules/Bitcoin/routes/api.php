<?php

Route::group(['prefix' => 'currency', 'namespace' => 'App\Modules\Bitcoin\Controllers'], function(){
    Route::get('/', 'BitcoinController@index');
    Route::post('add', 'BitcoinController@insert');
});

