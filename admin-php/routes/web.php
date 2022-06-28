<?php

use App\Models\Config;
use App\Models\Site;
use App\Models\User;
use App\Notifications\EmailValidateCodeNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('test', function () {
    return app('permission')->syncSitePermissions(Site::find(1));
});
