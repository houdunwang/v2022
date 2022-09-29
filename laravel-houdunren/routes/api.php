<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CodeController;
use App\Http\Controllers\TopicController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::controller(CodeController::class)->prefix('code')->group(function () {
    Route::post('send', 'send');
});

Route::controller(AuthController::class)->prefix('auth')->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
});

Route::controller(TopicController::class)->prefix('topic')->group(function () {
    Route::apiResource(null, TopicController::class)->parameters([null => 'topic']);
});
