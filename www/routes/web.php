<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;

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

Route::get('/{date?}',          [PublicController::class, 'index']      )->name(PublicController::ROUTE_INDEX)->middleware('auth');
Route::get('/user/auth',        [PublicController::class, 'auth']       )->name(PublicController::ROUTE_AUTH);
Route::get('/user/register',    [PublicController::class, 'register']   )->name(PublicController::ROUTE_REGISTER);
