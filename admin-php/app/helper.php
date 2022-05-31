<?php

use Illuminate\Support\Facades\Auth;

function user()
{
    return Auth::user();
}

function is_super_admin()
{
    if (Auth::check()) return user()['is_super_admin'];
}
