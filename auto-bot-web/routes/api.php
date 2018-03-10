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

        Route::get('/{id}', 'ReportpersonalController@getPersonalreport');

    });

});