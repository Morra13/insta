<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CurrencyController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\AuthController;

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

Route::post('/register',    [RegisterController::class, 'register']     )->name(RegisterController::ROUTE_REGISTER);
Route::post('/auth',        [AuthController::class, 'auth']             )->name(AuthController::ROUTE_AUTH);
Route::get('/logout',       [AuthController::class, 'logout']           )->name(AuthController::ROUTE_LOGOUT);

Route::post('/parseCurrency',   [CurrencyController::class, 'parseCurrency']    )->name(CurrencyController::ROUTE_PARSE_CURRENCY);
Route::post('/deleteAll',       [CurrencyController::class, 'deleteAll']        )->name(CurrencyController::ROUTE_DELETE_ALL);
