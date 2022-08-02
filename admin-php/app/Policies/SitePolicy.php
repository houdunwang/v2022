<?php

namespace App\Policies;

use App\Models\User;
use App\Models\site;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class SitePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return true;
    }

    public function view(User $user, site $site)
    {
        return true;
    }

    public function create(User $user)
    {
        return is_super_admin();
    }

    public function update(User $user, site $site)
    {
        return is_super_admin() || $user->id === $site->user_id;
    }

    public function delete(User $user, site $site)
    {
        return access('site-del');
    }

    public function restore(User $user, site $site)
    {
    }

    public function forceDelete(User $user, site $site)
    {
    }
}
