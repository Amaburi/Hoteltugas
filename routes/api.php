<?php

use App\Http\Controllers\hotel\getuserid\GetUserIdController;
use App\Http\Controllers\hotel\kamar\kamarController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\profile\user\AuthController;
use App\Http\Controllers\hotel\listhotel\ListController;
use App\Http\Controllers\hotel\payment\PaymentController;
use App\Http\Controllers\hotel\Review\ReviewController;

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
        'jyyyy' => 'jyyyy'
    ]);
});

Route::middleware('guest')->group(function() {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);
});

Route::middleware('auth:sanctum')->group(function() {
    Route::post('logout', [AuthController::class, 'logout']);
    
    Route::prefix('admin')->middleware('role:admin')->group(function() {
        Route::resource('users', AuthController::class, ['only' => ['index']]);
        Route::resource('listhotel', ListController::class, ['only' => ['index','store','update','destroy']]);
        Route::resource('listkamar', kamarController::class, ['only' => ['index','store','update','destroy']]);
        Route::resource('payment', PaymentController::class, ['only' => ['index']]);
        Route::resource('userid', GetUserIdController::class, ['only' => ['index','store','destroy']]);
        Route::resource('review', ReviewController::class, ['only' => ['index','update','destroy']]);
    });
    
    Route::prefix('user')->middleware('role:user')->group(function() {
        Route::resource('listshotel', ListController::class, ['only' => ['index']]);
        Route::resource('listskamar', kamarController::class, ['only' => ['index']]);
        Route::resource('payments', PaymentController::class, ['only' => ['store']]);
        Route::resource('payments', PaymentController::class, ['only' => ['show']]);
        Route::resource('userids', GetUserIdController::class, ['only' => ['show']]);
        Route::resource('reviews', ReviewController::class, ['only' => ['index','store','update','destroy','show']]);
    });
});