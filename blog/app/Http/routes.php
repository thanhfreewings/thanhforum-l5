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
	Route::get('/user/create', 'UserController@create');
	Route::get('/user/view/{id}', 'UserController@view');
	Route::get('/user/upload', 'UserController@upload');
	Route::post('/user/search', 'UserController@postSearch');
	Route::get('/user/edit', 'UserController@getEdit');
	Route::post('/user/edit', 'UserController@postEdit');
	Route::get('/user/success', 'UserController@success');
	Route::post('/user/upload', 'UserController@postUpload');
	Route::get('/thread', 'ThreadController@index');
	Route::get('/thread/create', 'ThreadController@getCreate');
	Route::get('/thread/created', 'ThreadController@created');
	Route::post('/thread/create', 'ThreadController@postCreate');
	Route::get('/thread/delete/{id}', 'ThreadController@delete');
	Route::get('/thread/update/{id}', 'ThreadController@getUpdate');
	Route::post('/thread/update/{id}', 'ThreadController@postUpdate');
	Route::get('/thread/view/{id}', 'ThreadController@getView');
	Route::get('/message/inbox', 'MessageController@inbox');
	Route::get('/message/inbox/delete/{id}', 'MessageController@inboxDelete');
	Route::get('/message/sent', 'MessageController@sent');
	Route::get('/message/sent/delete/{id}', 'MessageController@sentDelete');
	Route::get('/message/create', 'MessageController@getCreate');
	Route::post('/message/create', 'MessageController@postCreate');
	Route::get('/message/reply/{id}', 'MessageController@getReply');
	Route::post('/message/reply/{id}', 'MessageController@postReply');
	Route::post('/comment/create', 'CommentController@postCreate');

	Route::resource('member', 'MemberController');
	Route::resource('role', 'RoleController');
});


Route::group(['middleware' => 'web'], function () {
    Route::auth();
});
