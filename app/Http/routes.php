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

// Contracts
Route::resource('contract','ContractController');

// Services
Route::resource('service','ServiceController');

// Payments
Route::resource('payment','PaymentController');

// Payments
Route::resource('user','UserController');

// Auth routes
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
