<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

//Authentication Routes
	Auth::routes();
	Route::get('auth/login', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);
	Route::post('auth/login', 'Auth\LoginController@login');
	Route::get('auth/logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);

	//Registration Routes
	Route::get('auth/register', 'Auth\RegisterController@getRegister');
	Route::post('auth/register', 'Auth\RegisterController@postRegister');

Route::get('/', 'HomeController@index')->name('home');
