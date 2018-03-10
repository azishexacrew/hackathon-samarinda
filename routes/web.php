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

Route::get('tenant','TenantController@konfirmasi');


Route::resource('event','EventController');

Route::get('personalisasi',function(){
	return view('personalisasi.index');
});

Route::resource('registerr','RegisterController');
Route::get('loginn','LoginController@index')->name('loginn.index');
Route::post('loginn/store','LoginController@store')->name('loginn.store');
Route::get('loginn/logout','LoginController@logout')->name('loginn.logout');

Route::resource('pengaturan','PengaturanController');

Auth::routes();

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
