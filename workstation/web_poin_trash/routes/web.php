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
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('bankSampahs', 'BankSampahController');

Route::resource('jenisSampahs', 'JenisSampahController');

Route::resource('kurirSampahs', 'KurirSampahController');

Route::resource('markets', 'MarketController');

Route::resource('petugas', 'PetugasController');

Route::resource('petugas', 'PetugasController');

Route::resource('petugas', 'PetugasController');

Route::resource('transaksiSampahs', 'TransaksiSampahController');

Route::resource('transaksiSampahDetils', 'TransaksiSampahDetilController');

Route::resource('transaksiTukarpoins', 'TransaksiTukarpoinController');

//zizaco entrust
Route::resource('roles', 'RoleController');

Route::resource('user_role', 'UserRoleController', ['except' => [
    'create', 'store', 'show', 'destroy',
]]);

Route::resource('permissions', 'PermissionController');

Route::resource('users', 'UserController');
//end zizaco

Route::resource('kecamatans', 'KecamatanController');

Route::get('sync_data_kecamatan','KecamatanController@synct_data_api');

Route::get('sync_data_banksampah','BankSampahController@synct_data_api');