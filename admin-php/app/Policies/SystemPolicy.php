<?php

namespace App\Policies;

use App\Models\System;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SystemPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return true;
    }

    public function view(User $user, System $config)
    {
    }

    public function create(User $user)
    {
    }

    public function update(User $user, System $config)
    {
        return $user->is_super_admin;
    }

    public function delete(User $user, System $config)
    {
    }
}
