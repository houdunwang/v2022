<?php

use Illuminate\Support\Facades\Auth;

if (!function_exists('isSuperadmin')) {
    //超级管理员
    function isSuperadmin()
    {
        return Auth::check() || Auth::id() == 1;
    }
}
