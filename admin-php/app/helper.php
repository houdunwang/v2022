<?php

use App\Models\Site;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

function user()
{
    return Auth::user();
}

function is_super_admin()
{
    if (Auth::check()) return user()['is_super_admin'];
}


function access(string $name, Site $site = null, User $user = null, $force = false)
{
    $site = $site ?? request('site');
    $user = $user ?? Auth::user();

    if ($user->is_super_admin || $site->user_id == $user->id) return true;

    $state = $user->roles()->whereRelation('permissions', function ($query) use ($site, $name) {
        $query->where('name', $name)->where('roles.site_id', $site->id);
    })->exists();

    if ($state === false) return $force ? abort(403) : $force;

    return $state;
}
