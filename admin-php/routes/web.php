<?php

use App\Models\Site;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function (Request $request) {
    $site = Site::where('url', $request->host())->first();

    if ($site && $site->module) {
        $moduleHtml = public_path("addons/{$site->module->name}/dist/index.html");
        if (is_file($moduleHtml)) return file_get_contents($moduleHtml);
    }

    return redirect('/core');
});

Route::fallback(function ($path = 'core') {
    $pathinfo = explode('/', $path);
    if (!preg_match('/core|install/i', $pathinfo[0])) {
        $template = public_path("addons/$pathinfo[0]/dist/index.html");
        if (is_file($template)) return file_get_contents($template);
    }
    return file_get_contents(public_path('core/index.html'));
});
