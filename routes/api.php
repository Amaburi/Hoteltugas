<?php

use App\Http\Controllers\hotel\kamar\kamarController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\profile\user\AuthController;
use App\Http\Controllers\hotel\listhotel\ListController;

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

Route::any('/', function() {
    return response()->json([
        'awikwok' => 'Apri'
    ]);
});

Route::middleware('guest')->group(function() {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);
});

Route::middleware('auth:sanctum')->group(function() {
    Route::post('logout', [AuthController::class, 'logout']);
    
    // Get All user
    Route::prefix('admin')->middleware('role:admin')->group(function() {
        Route::resource('users', AuthController::class, ['only' => ['index']]);
    });
    // Hotel List
    Route::prefix('admin')->middleware('role:admin')->group(function() {
        Route::resource('listhotel', ListController::class, ['only' => ['index','store','update']]);
    });
    Route::prefix('user')->middleware('role:user')->group(function() {
        Route::resource('listhotel', ListController::class, ['only' => ['index']]);
    });
    // Room list
    Route::prefix('admin')->middleware('role:admin')->group(function() {
        Route::resource('listkamar', kamarController::class, ['only' => ['index','store','update']]);
    });
    Route::prefix('user')->middleware('role:user')->group(function() {
        Route::resource('listkamar', kamarController::class, ['only' => ['index']]);
    });
    // Payment
    Route::prefix('admin')->middleware('role:admin')->group(function() {
        Route::resource('payment', kamarController::class, ['only' => ['index']]);
    });
    Route::prefix('user')->middleware('role:user')->group(function() {
        Route::resource('payment', kamarController::class, ['only' => ['index','store']]);
    });
});