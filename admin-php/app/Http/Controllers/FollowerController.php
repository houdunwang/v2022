<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowerController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum']);
    }

    // 关注列表
    public function index(User $user)
    {
        return UserResource::collection($user->followers);
    }

    /**
     * 关注或取关用户
     * @param User $user
     * @return array
     */
    public function toggle(User $user)
    {
        Auth::user()->followers()->toggle($user->id);
        return $this->success(data: ['isFollower' => Auth::user()->isFollower($user)]);
    }
}
