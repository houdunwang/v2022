<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum']);
    }

    public function index()
    {
        $users = User::queryCondition()->paginate(request('row', 10));

        return UserResource::collection($users);
    }

    public function show(User $user)
    {
        return $this->success(data: new UserResource($user));
    }

    /**
     * 当前用户资料
     * @return array
     */
    public function currentUserInfo()
    {
        $user = Auth::user()->makeVisible('mobile')->refresh()->load('roles.permissions');

        return $this->success(data: new UserResource($user));
    }

    /**
     * 设置角色
     *
     * @param User $user
     * @param Role $role
     */
    public function role(User $user, Role $role)
    {
        $user->roles()->sync($role->id);
        return $this->success(data: $user->roles);
    }
}
