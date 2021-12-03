<?php

use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\AuthController;
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

Route::post('login', [AuthController::class, 'login']);

Route::group(['middleware' => ['apiJWT']], function (){

    Route::prefix('customers')->group(function () {
        Route::get('/', [CustomerController::class,'index']);
        Route::post('/', [CustomerController::class,'store']);
        Route::put('/{id}', [CustomerController::class,'update']);
        Route::delete('/{id}', [CustomerController::class,'destroy']);
        Route::get('/{id}', [CustomerController::class,'show']);
    });
    
    Route::prefix('categories')->group(function () {
        Route::get('/', [CategoryController::class,'index']);
        Route::post('/', [CategoryController::class,'store']);
        Route::put('/{id}', [CategoryController::class,'update']);
        Route::delete('/{id}', [CategoryController::class,'destroy']);
        Route::get('/{id}', [CategoryController::class,'show']);
    });
});



