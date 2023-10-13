<?php

use App\Http\Controllers\ApiAuthorController;
use App\Http\Controllers\ApiBookController;
use App\Http\Controllers\ApiLocationController;
use App\Http\Controllers\UserController;
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
Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::apiResource('books', ApiBookController::class);
    Route::apiResource('authors', ApiAuthorController::class);
    Route::apiResource('locations', ApiLocationController::class);
});

Route::post("login",[UserController::class,'index']);