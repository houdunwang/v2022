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
        $this->middleware(['auth:sanctum'])->only(['toggle']);
    }

    public function index(User $user)
    {
        $followers = $user->followers;
        return $this->success(data: UserResource::collection($followers));
    }

    public function toggle(User $user)
    {
        Auth::user()->followers()->toggle($user);

        return $this->success(data: Auth::user()->isFollower($user));
    }
}
