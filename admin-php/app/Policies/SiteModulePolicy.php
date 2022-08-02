<?php

namespace App\Policies;

use App\Models\SiteModule;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SiteModulePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return access('system-module-list');
    }

    public function view(User $user, SiteModule $siteModule)
    {
    }

    public function create(User $user)
    {
        return is_super_admin();
    }

    public function update(User $user)
    {
        return is_super_admin();
    }

    public function delete(User $user)
    {
        return is_super_admin();
    }

    public function restore(User $user, SiteModule $siteModule)
    {
    }

    public function forceDelete(User $user, SiteModule $siteModule)
    {
    }
}
