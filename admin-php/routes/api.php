<?php

use App\Http\Controllers\ConfigController;
use App\Http\Controllers\ForgetPasswordController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\ValidateCodeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', RegisterController::class);
Route::post('login', LoginController::class);
Route::post('account/forget-password', ForgetPasswordController::class);

Route::post('code/send', [ValidateCodeController::class, 'send']);
Route::post('code/user/{type}', [ValidateCodeController::class, 'user']);

Route::put('config/{name}', [ConfigController::class, 'update']);

Route::post('upload/avatar', [UploadController::class, 'avatar']);

Route::apiResource('permission', PermissionController::class);
Route::apiResource('role', RoleController::class);
