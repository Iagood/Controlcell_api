<?php

use App\Http\Controllers\Api\CustomerController;
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

Route::get('customers', [CustomerController::class, 'index']);
Route::post('customers', [CustomerController::class,'store']);
Route::put('customers/{id}', [CustomerController::class,'update']);
Route::delete('customers/{id}', [CustomerController::class,'destroy']);
