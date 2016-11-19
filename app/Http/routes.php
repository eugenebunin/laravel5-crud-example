<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
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
    Route::post('/pages', 'Site\PageController@create');
    Route::post('/pages/delete/{id}', 'Site\PageController@delete');
    Route::get('/pages', 'Site\PageController@index');
    Route::get('/pages/show/{id}', 'Site\PageController@show');
});
