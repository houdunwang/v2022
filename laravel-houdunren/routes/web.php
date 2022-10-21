<?php

use Illuminate\Support\Facades\Route;

Route::get('/abc', function () {
    return config('hd.aliyudn.aliyun_key');
});
