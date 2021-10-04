<?php

use App\Http\Controllers\FlipCoinController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\UnixTimeController;
use App\Http\Controllers\ValdateEmailController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [PublicController::class, 'index']);

Route::get('/fetch-unix-time', [UnixTimeController::class, 'index']);
Route::post('/unix-converter', [UnixTimeController::class, 'convertToTimestamp']);

Route::get('/fetch-emails', [ValdateEmailController::class, 'index']);
Route::post('/email-validation', [ValdateEmailController::class, 'emailValiation']);

Route::get('/fetch-coins', [FlipCoinController::class, 'index']);
Route::post('/flip-coin', [FlipCoinController::class, 'flip']);
