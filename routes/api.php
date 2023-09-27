<?php

use App\Http\Controllers\AmbassadorController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
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

//Admin
Route::prefix('admin')->group(function () {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);

    Route::middleware(['auth:sanctum', 'scope.admin'])->group(function (){
        Route::get('user', [AuthController::class, 'user']);
        Route::post('logout', [AuthController::class, 'logout']);
        Route::put('user/info', [AuthController::class, 'updateInfo']);
        Route::put('user/password', [AuthController::class, 'updatePassword']);

        Route::get('ambassadors', [AmbassadorController::class, 'index']);

        Route::apiResource('products', ProductController::class);
    });
});


//Ambassador

//Checkout
