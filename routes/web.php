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

Route::get('/', 'LandingController@index');

Route::get('provinsi','LandingController@provinsi');


Route::get('tenant','TenantController@konfirmasi');

Route::get('tenant/konfirmasi','TenantController@konfirmasi');

Route::get('event/generate',function(){
	return view('event.generate');
});

Route::group(['middleware' => 'masuk'],function(){
  Route::resource('event','EventController');
});


Route::get('personalisasi',function(){
	return view('personalisasi.index');
});


  Route::resource('registerr','RegisterController');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
