<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/*Route::post('auth/register', 'UserAPIController@register');
Route::post('auth/login', 'UserAPIController@login');*/

Route::group(['middleware' => 'jwt.auth'], function () {
    Route::get('user', 'UserAPIController@getAuthUser');
    Route::resource('users', 'UserAPIController',['except' => [
        'create','show','update'
    ]]);

    Route::get('users/show','UserAPIController@show');

    Route::post('users/update','UserAPIController@update');

    Route::post('users/password','UserAPIController@changePassword');

    Route::post('token_device','UserAPIController@storeTokenDevice');
});

Route::post('users','UserAPIController@store');

Route::post('token','AuthenticateAPIController@authenticate');

Route::post('reset_password', 'UserAPIController@resetPassword');

Route::resource('transaksi_tukarpoins', 'TransaksiTukarpoinAPIController');

Route::resource('bank_sampahs', 'BankSampahAPIController');

Route::resource('transaksi_sampah_detils', 'TransaksiSampahDetilAPIController');

Route::resource('transaksi_sampahs', 'TransaksiSampahAPIController');

Route::resource('petugas', 'PetugasAPIController');

Route::resource('markets', 'MarketAPIController');

Route::resource('kurir_sampahs', 'KurirSampahAPIController');

Route::resource('jenis_sampahs', 'JenisSampahAPIController');

//jwt
//Route::post('api/authenticate', 'jwtController@authenticate');

Route::resource('kecamatans', 'KecamatanAPIController');