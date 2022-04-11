<?php

use App\Http\Controllers\ConfigController;
use App\Http\Controllers\FansController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\ForgetPasswordController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CodeController;
use App\Http\Controllers\LogoutController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', RegisterController::class);
Route::post('login', LoginController::class);
Route::get('logout', LogoutController::class);
Route::post('account/forget-password', ForgetPasswordController::class);

Route::post('code/send', [CodeController::class, 'send']);
Route::post('code/user/{type}', [CodeController::class, 'user']);

Route::put('config/{name}', [ConfigController::class, 'update']);

Route::post('upload/avatar', [UploadController::class, 'avatar']);

Route::apiResource('permission', PermissionController::class);
Route::put('role/permission/{role}', [RoleController::class, 'permission']);
Route::apiResource('role', RoleController::class);

Route::get('user/info', [UserController::class, 'info']);
Route::apiResource('user', UserController::class);

Route::get('follower/{user}', [FollowerController::class, 'index']);
Route::get('follower/toggle/{user}', [FollowerController::class, 'toggle']);
Route::get('fans/{user}', [FansController::class, 'index']);
