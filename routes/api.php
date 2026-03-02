<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\ScoreController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\LogoutController;
use App\Http\Middleware\ensuretoken;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


 function ($router) {};
    Route::apiResource('score', ScoreController::class);
    Route::post('register', RegisterController::class);
    Route::post('login', LoginController::class);
    Route::post('logout', LogoutController::class);
