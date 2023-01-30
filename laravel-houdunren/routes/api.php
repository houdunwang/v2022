<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\AttachmentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CaptchaController;
use App\Http\Controllers\CodeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\LearnHistoryController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\SignController;
use App\Http\Controllers\SystemController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\WechatController;
use App\Http\Controllers\WechatLoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlipayController;
use App\Http\Controllers\WepayController;

Route::controller(CodeController::class)->prefix('code')->group(function () {
    Route::post('send', 'send');
});

Route::controller(AuthController::class)->prefix('auth')->group(function () {
    Route::post('login', 'login');
    Route::post('logout', 'logout');
    Route::post('register', 'register');
    Route::post('password', 'password');
});

//用户
Route::get('user/info', [UserController::class, 'info']);
Route::post('user/mobile', [UserController::class, 'mobile']);
Route::apiResource('user', UserController::class);

Route::controller(TopicController::class)->prefix('topic')->group(function () {
    Route::apiResource(null, TopicController::class)->parameters([null => 'topic']);
});

//系统课程
Route::post('system/order', [SystemController::class, 'order']);
Route::apiResource('system', SystemController::class);
//课程
Route::apiResource('lesson', LessonController::class);

//视频
Route::apiResource('video', VideoController::class);

//签到
Route::apiResource('sign', SignController::class);

//收藏
Route::post('favorite/{type}/{id}', [FavoriteController::class, 'toggle']);

//评论
Route::post('comment/{type}/{id}', [CommentController::class, 'store']);
Route::get('comment/{type}/{id}', [CommentController::class, 'index']);
Route::apiResource('comment', CommentController::class);

//图形验证码
Route::get('captcha', CaptchaController::class);

//上传
Route::post('upload/image', [AttachmentController::class, 'image']);

// 动态
Route::apiResource('activity', ActivityController::class);

//学习动态
Route::get('learnHistory/{user}', [LearnHistoryController::class, 'getByUser']);
Route::apiResource('learnHistory', LearnHistoryController::class);

//wechat
Route::any('wechat', WechatController::class);
Route::get('wechat/ticket', [WechatLoginController::class, 'ticket']);
Route::get('wechat/qr_image/{ticket}', [WechatLoginController::class, 'qrImage']);
Route::get('wechat/login/{ticket}', [WechatLoginController::class, 'loginByTicket']);


//支付宝
Route::controller(AlipayController::class)->prefix("alipay")->group(function () {
    Route::post('create_order', 'createOrder');
    Route::get('pay/{order:sn}', 'pay');
    Route::get('return', 'returnUrl');
    Route::any('notify', 'notifyUrl');
});

//微信支付
Route::controller(WepayController::class)->prefix("wepay")->group(function () {
    Route::post('create_order', 'createOrder');
    Route::get('pay/{order:sn}', 'pay');
    Route::get('mp', 'mp');
    Route::any('notify', 'notifyUrl');
});
