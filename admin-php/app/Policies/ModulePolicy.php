<?php

namespace App\Policies;

use App\Models\Module;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ModulePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return is_super_admin();
    }

    public function view(User $user, Module $module)
    {
    }

    public function create(User $user)
    {
        return is_super_admin();
    }

    public function update(User $user, Module $module)
    {
        return is_super_admin();
    }

    public function delete(User $user, ?Module $module)
    {
        return is_super_admin();
    }
}
