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
	header('Location:/posts');
}); 

Route::resource('posts', 'PostsController');
Route::get('/usersposts/{number}','PostsController@usersposts');

// Post vote routes
Route::get('/upvote/{id}','PostsController@upvote');
Route::get('/downvote/{id}','PostsController@downvote');

 
// Login routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::get('/uppercase/{string}','HomeController@uppercase');
Route::get('/lowercase/{string}','HomeController@lowercase');
Route::get('/increment/{number}','HomeController@increment');
Route::get('/add/{number}/{number2}','HomeController@add');
Route::get('/rolldice/{guess}', 'HomeController@rolldice');
Route::get('/zero', 'HomeController@resetToZero');











