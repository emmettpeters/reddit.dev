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

Route::get('/uppercase/{string}','HomeController@uppercase');
Route::get('/lowercase/{string}','HomeController@lowercase');
Route::get('/increment/{number}','HomeController@increment');
Route::get('/add/{number}/{number2}','HomeController@add');
Route::get('/rolldice/{guess}', 'HomeController@rolldice');
Route::get('/zero', 'HomeController@resetToZero');
Route::resource('posts', 'PostsController');
