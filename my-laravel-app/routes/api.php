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

//// まとめずに書くなら、こんな感じ
// Route::get('call/me', 'API\CallMeAPIController@callMeGet');


// 先頭「api」をまとめて書く場合、こんな感じ
Route::group(['namespace' => 'API'], function () {
    Route::get('call/me', 'CallMeAPIController@callMeGet');
    Route::post('call/me', 'CallMeAPIController@callMePost');
    Route::get('challenge_usersGet', 'CallMeAPIController@challenge_usersGet');
    Route::post('challenge_usersGet', 'CallMeAPIController@challenge_usersPost');
});
