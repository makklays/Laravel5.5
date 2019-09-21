<?php

Route::group(['prefix' => 'currency', 'namespace' => 'App\Modules\Bitcoin\Controllers'], function(){
    Route::get('/', 'BitcoinController@index');
    Route::get('json', 'BitcoinController@getDataJson');
    Route::post('create', 'BitcoinController@insert');
    Route::match(['post', 'get'], 'xml', 'BitcoinController@getDataXML');
    Route::get('excel', 'BitcoinController@getDataExcel');
    Route::get('csv', 'BitcoinController@getDataCSV');
});

