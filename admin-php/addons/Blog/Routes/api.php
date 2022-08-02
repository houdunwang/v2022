<?php

use Addons\Blog\Controllers\ArticleController;
use Illuminate\Http\Request;

Route::apiResource('site/{site}/blog/article', ArticleController::class);
