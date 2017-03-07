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
    return view('login');
});

/*
Route::resource('tasks','TaskController');
*/

Route::get('/dash', 'WelcomeController@index');

Route::get('/home', 'HomeController@index');
/*
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);*/

Route::get('/test', 'TestController@index');
