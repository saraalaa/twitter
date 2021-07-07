<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => 'localization'], function () {

    Route::post('signup', [\App\Http\Controllers\AuthController::class, 'signup']);
    Route::post('login', [\App\Http\Controllers\AuthController::class, 'login']);

    Route::group(['middleware' => 'auth:sanctum'], function () {
        Route::post('tweets', [\App\Http\Controllers\TweetController::class, 'store']);
        Route::get('tweets', [\App\Http\Controllers\TweetController::class, 'index']);
        Route::post('follow', [\App\Http\Controllers\FollowController::class, 'follow']);
    });
});
