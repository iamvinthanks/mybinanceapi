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
Route::get('/tron','App\Http\Controllers\Api\PaymentController@tronPayment');

Route::post('/register', [App\Http\Controllers\API\AuthController::class, 'register']);
//API route for login user
Route::post('/login', [App\Http\Controllers\API\AuthController::class, 'login']);
Route::post('webhook', 'App\Http\Controllers\Api\PaymentController@getblock');
Route::get('/verifcode', 'App\Http\Controllers\Api\BinanceController@verifcode');
Route::post('/redeemcode', 'App\Http\Controllers\Api\BinanceController@redeemcode');
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile','App\Http\Controllers\Api\AuthController@profile');
    Route::get('/ipcheck','App\Http\Controllers\Api\BinanceController@ipcheck');
    // API route for logout user
    Route::post('/logout', [App\Http\Controllers\API\AuthController::class, 'logout']);


    Route::post('/createescrow', 'App\Http\Controllers\Api\EscrowController@createescrow');
    Route::put('/joinescrow', 'App\Http\Controllers\Api\EscrowController@joinescrow');
    Route::get('/escrowdetail/{escrow_id}', 'App\Http\Controllers\Api\EscrowController@getEscrowdetail');
    Route::post('/approveescrow/{escrow_id}/seller', 'App\Http\Controllers\Api\EscrowController@approveescrowseller');
    Route::post('/approveescrow/{escrow_id}/buyer', 'App\Http\Controllers\Api\EscrowController@approveescrowbuyer');
    Route::post('/paymentprocess','App\Http\Controllers\Api\PaymentController@createpayment');
    Route::get('/reklist', 'App\Http\Controllers\Api\MemberController@NorekUser');
});
