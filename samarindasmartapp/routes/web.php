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

// Route::get('register', 'RegisterController@getRegister')->name('register');
// Route::post('postRegister', 'RegisterController@postRegister');

// Route::get('login', 'LoginController@getLogin')->name('login');

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/user/logout', 'Auth\LoginController@logoutUser')->name('user.logout');

Route::get('/pengguna/rukokios', 'RukoKiosPController@getIndex')->name('pengguna.rukokios');
Route::get('/pengguna/datapenyewarukokios', 'RukoKiosPController@getdataPenyewa')->name('pengguna.datapenyewarukokios');
Route::get('pengguna/{slug}', ['as' => 'pengguna.bacaRuko', 'uses' => 'RukoKiosPController@bacaRuko'])->where('slug', '[\w\d\-\_]+');
Route::get('penggunaa/{slug}', ['as' => 'pengguna.bacaKios', 'uses' => 'RukoKiosPController@bacaKios'])->where('slug', '[\w\d\-\_]+');

Route::resource('sewaRuko', 'SewaRukoController');
Route::resource('sewaKios', 'SewaKiosController');

Route::group(['prefix' => 'admin'], function(){
	Route::get('/login', 'AuthAdmin\LoginController@showLoginForm')->name('admin.login');
	Route::post('/login', 'AuthAdmin\LoginController@login')->name('admin.login.submit');
	Route::get('/', 'AdminController@index')->name('admin.home');
	Route::get('/logout', 'AuthAdmin\LoginController@logout')->name('admin.logout');

	Route::resource('ruko', 'RukoController');
	Route::resource('kios', 'KiosController');
});