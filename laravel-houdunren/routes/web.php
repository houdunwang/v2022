<?php

use Illuminate\Support\Facades\Route;

Route::get('/abc', function () {
    return config('hd.aliyun.aliyun_key');
});
