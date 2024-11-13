<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UserLoginController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group(['prefix' => 'v3'], function () {
    Route::post('merchant/user/login', [UserLoginController::class, 'login']);

    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('transactions/report', [TransactionController::class, 'getTransactonReport']);
        Route::get('transaction/list', [TransactionController::class, 'getTransactionQuery']);
        Route::get('transaction', [TransactionController::class, 'findByTransactionId']);
        Route::get('client', [CustomerController::class, 'findCustomerByTransactionId']);
    });
});
