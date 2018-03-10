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

Route::get('kecamatan','KecamatanController@index');


Route::get('tenant','TenantController@konfirmasi');


// Route::group(['middleware' => 'masuk'],function(){
  Route::get('event/generate','EventController@generate');
  Route::resource('event','EventController');
// });

Route::get('personalisasi',function(){
	return view('personalisasi.index');
});

Route::resource('registerr','RegisterController');

Auth::routes();

Route::get('login', function(){
	return view('login.index');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('pembayaran',function(){
	return view('pembayaran.index');
});

Route::get('pembayaran/konfirmasi',function(){
	return view('pembayaran.konfirmasibayar');
});

Route::get('pembayaran/cara',function(){
	return view('pembayaran.carabayar');
});
