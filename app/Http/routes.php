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

// Cover
Route::get('/', 'WelcomeController@index');

// User home
Route::get('home', 'HomeController@index');

// Join & quit services
Route::post('home/join-service', 'HomeController@joinService');
Route::post('home/quit-service', 'HomeController@quitService');

// Auth routes
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
