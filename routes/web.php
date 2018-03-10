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

Route::get('profile','ProfileController@index');

Route::get('provinsi','LandingController@provinsi');

<<<<<<< HEAD
Route::get('tenant','TenantController@konfirmasi');

Route::get('register',function(){
	return view('register.index');
});
=======
Route::get('tenant/konfirmasi','TenantController@konfirmasi');

Route::resource('event','EventController');
>>>>>>> b89736e720fd72ecd1d7ac8bc1700debcf9761ad
