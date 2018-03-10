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

Route::get('/', 'LandingController@index')->name('landingpage');

Route::get('kecamatan','KecamatanController@index');


Route::get('tenant','TenantController@konfirmasi');


Route::group(['middleware' => 'masuk'],function(){
  Route::get('event/generate','EventController@generate')->name('event.generate');
  Route::resource('event','EventController');
});

Route::get('personalisasi',function(){
	return view('personalisasi.index');
});

Route::resource('registerr','RegisterController');
Route::resource('loginn','LoginController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
