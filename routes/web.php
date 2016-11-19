<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/info', function () {
    if ( env('APP_ENV') != 'production' ) {
		    phpinfo();
	  }
});

Route::group(['middleware' => ['web']], function () {
    Route::post('/pages', 'Site\PageController@save');
    Route::post('/pages/delete/{id}', 'Site\PageController@delete');
    Route::get('/pages', 'Site\PageController@index');
    Route::get('/pages/edit/{id}', 'Site\PageController@edit');
});
