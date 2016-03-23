<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web','auth']], function () {
	Route::get('/', 'ThreadController@index');
	Route::get('/home', 'ThreadController@index');
	Route::get('/user/create', 'UserController@create');
	Route::get('/user/view/{id}', 'UserController@view');
	Route::get('/thread', 'ThreadController@index');
	Route::get('/thread/view/{id}', 'ThreadController@view');
	Route::get('/message', 'MessageController@index');
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();
});
