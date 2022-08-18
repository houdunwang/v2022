<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Addons\Blog\Controllers\ArticleController;

Route::prefix('Blog')->group(function () {
    Route::apiResource('site.article', ArticleController::class);
});
