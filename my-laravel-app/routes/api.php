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


// 先頭「api」をまとめて書き、先頭にプレフィックスを付ける場合、こんな感じ。
Route::group(['namespace' => 'API'], function () {
    //--------------------------------
    //         Question 01
    //--------------------------------
    Route::prefix('q01')->group(function () {
        Route::get('call/me', 'Question01ApiController@callMeGet');
        Route::post('call/me', 'Question01ApiController@callMePost');
        Route::get('challenge_users', 'Question01ApiController@challenge_usersGet');
        Route::post('challenge_users', 'Question01ApiController@challenge_usersPost');
    });

    //--------------------------------
    //         Question 02
    //--------------------------------
    Route::prefix('q02')->group(function () {
        Route::get('call/me', 'Question02ApiController@callMeGet');
        Route::post('call/me', 'Question02ApiController@callMePost');
        Route::get('challenge_users', 'Question02ApiController@challenge_usersGet');
        Route::post('challenge_users', 'Question02ApiController@challenge_usersPost');
    });

});