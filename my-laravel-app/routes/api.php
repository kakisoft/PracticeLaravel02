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
// Route::get('call/me', 'API\Question01ApiController@callMeGet');


// 先頭「api」をまとめて書く場合、こんな感じ
Route::group(['namespace' => 'API'], function () {
    Route::get('call/me', 'Question01ApiController@callMeGet');
    Route::post('call/me', 'Question01ApiController@callMePost');
    Route::get('challenge_users', 'Question01ApiController@challenge_usersGet');
    Route::post('challenge_users', 'Question01ApiController@challenge_usersPost');
});
