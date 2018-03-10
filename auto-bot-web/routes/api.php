<?php

use Illuminate\Http\Request;
use App\Models\User;
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

Route::get('/', function (){
    $user = User::with('profil')->first();
    return response()->json(['data'=>$user]);
});

Route::group(['prefix' => 'report'], function (){

    Route::group(['prefix' => 'personal', 'namespace' => 'API\Report\Personal'], function (){
        Route::get('/', 'ReportpersonalController@index');
        Route::post('/create', 'ReportpersonalController@store');
        Route::post('/edit/{id}', 'ReportpersonalController@update');
        Route::delete('/delete/{id}', 'ReportpersonalController@destroy');
        Route::get('/{id}', 'ReportpersonalController@getPersonalreport');
    });
});

Route::group(['prefix' => 'data', 'namespace' => 'API\Data'], function(){

    Route::get('/', 'TpsController@index');
    Route::post('/create', 'TpsController@store');
    Route::post('/edit/{id}', 'TpsController@update');
    Route::delete('/delete/{id}', 'TpsController@destroy');
    Route::get('/{id}', 'TpsController@show');
});
