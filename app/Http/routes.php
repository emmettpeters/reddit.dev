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


// Route::get('/uppercase/{string}', function ($string) {
// 	$upString = strtoupper($string);
// 	$data['upString']=$upString;
//     return view('uppercase',$data);
// });

// Route::get('/lowercase/{string}', function ($string) {
// 	$lowString = strtolower($string);
// 	$data['lowString']=$lowString;
//     return view('lowercase',$data);cre
// });

// Route::get('/increment/{number}', function ($number) {
//     return $number + 1;
// });

// Route::get('/add/{number}/{number2}', function ($number1,$number2) {
//     return $number1 + $number2;
// });

// Route::get('/rolldice/{guess}', function ($guess) {
// 	$data['rand'] = rand(1,6);
// 	$data['guess']= $guess;
//     return view('rolldice', $data);
// });
 
 
