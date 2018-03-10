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

Route::get('/', function () {
    return view('landing.index');
});

<<<<<<< HEAD
Route::get('/profile',function(){
	return view('profile.index');
});



=======
Route::get('kecamatan','KecamatanController@index');
>>>>>>> 2849a4af4f9954557acfd2a7d02e721c056b1d92
