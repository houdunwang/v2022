<?php

use Illuminate\Support\Facades\Auth;

if (!function_exists('isSuperadmin')) {
    //超级管理员
    function isSuperadmin()
    {
        return Auth::check() && Auth::id() == 1;
    }
}

if (!function_exists('modelClass')) {
    function modelClass(string $name)
    {
        return 'App\Models\\' . ucfirst($name);
    }
}

if (!function_exists('model')) {
    function model(string $name, int $id)
    {
        return modelClass($name)::findOrFail($id);
    }
}
