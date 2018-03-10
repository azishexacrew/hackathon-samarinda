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

Auth::routes();


Route::get('tenant', 'TenantController@index');

Route::group(['middleware' => 'auth'], function(){
  Route::get('/', 'HomeController@index');
});


Route::group(['prefix'=>'pemilik','as' => 'webpemilik::','middleware' => ['auth','pemilik']], function(){
  Route::get('/', 'HomeController@index');
  Route::resource('tenant', 'PemilikTenantController');
  Route::resource('penyewa', 'PenyewaController');
  Route::resource('sewa', 'SewaController');
  Route::get('sewa/bukti-sewa/{id}', 'SewaController@print');

});

Route::group(['prefix'=>'sitemanager','as' => 'web::','middleware' => ['auth','superadmin']], function(){
  Route::get('/', 'HomeController@index');
  Route::get('dashboard', function () {
    return view('home');
  });
  Route::resource('data-pemilik', 'PemilikController');
});
