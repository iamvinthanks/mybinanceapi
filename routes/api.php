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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/redeemcode', 'App\Http\Controllers\Api\BinanceController@redeemcode');
Route::get('token-limit', 'App\Http\Controllers\Api\BinanceController@tokenlimit');

Route::post('/validatebank', 'App\Http\Controllers\Api\PaymentController@validatebank');
Route::post('/sendmoney', 'App\Http\Controllers\Api\PaymentController@sendmoney');


Route::post('/register', [App\Http\Controllers\API\AuthController::class, 'register']);
//API route for login user
Route::post('/login', [App\Http\Controllers\API\AuthController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile','App\Http\Controllers\Api\AuthController@profile');
    Route::get('/verifcode', 'App\Http\Controllers\Api\BinanceController@verifcode');

    Route::get('/ipcheck','App\Http\Controllers\Api\BinanceController@ipcheck');
    // API route for logout user
    Route::post('/logout', [App\Http\Controllers\API\AuthController::class, 'logout']);
});