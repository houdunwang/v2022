<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', fn () => 'home');

Route::fallback(function () {
    $file = public_path('system/index.html');

    if (is_file($file)) {
        return file_get_contents($file);
    }

    return <<<str
<div style="padding:50px;">
<h1 style="font-size:200px;font-weight:bold;margin:0px;">:(</h1>
<p style="font-size:30px;">
    你还没有生成前端编译文件,请在vue目录执行 pnpm run dev 或 npm run dev
</p>
</div>

str;
});
