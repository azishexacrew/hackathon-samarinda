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

Route::get('kecamatan', 'TestApiController@kecamatan')->name('kecamatan');
Route::get('kelurahan', 'TestApiController@kelurahan')->name('kelurahan');
Route::get('tenant', 'TestApiController@tenant')->name('tenant');
