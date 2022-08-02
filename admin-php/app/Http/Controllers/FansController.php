<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class FansController extends Controller
{
    /**
     * 用户粉丝列表
     * @param User $user
     * @return array
     */
    public function index(User $user)
    {
        return $this->success(data: UserResource::collection($user->fans));
    }
}
