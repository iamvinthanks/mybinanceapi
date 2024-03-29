<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;

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

// Route::get('/', function () {
//     return view('navbar');
// });
Route::get('/escrow', function () {
    return view('escrow.navbar');
});

Route::get('/', [IndexController::class, 'index']);
Route::get('/escrow', [IndexController::class, 'escrow']);
Route::get('/escrow/transaction/{escrow_id}', [IndexController::class, 'escrowtransaction']);
