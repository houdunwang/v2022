<?php

namespace App\Policies;

use App\Models\Sign;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SignPolicy
{
    use HandlesAuthorization;

    public function before()
    {
        // if (isSuperadmin()) return true;
    }

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Sign  $sign
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Sign $sign)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //你只能签到当天
        return !$user->signs()->whereDate('created_at', now())->exists();
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Sign  $sign
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Sign $sign)
    {
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Sign  $sign
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Sign $sign)
    {
        return $user->id == $sign->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Sign  $sign
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Sign $sign)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Sign  $sign
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Sign $sign)
    {
        //
    }
}
