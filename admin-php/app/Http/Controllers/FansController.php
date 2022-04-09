<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class FansController extends Controller
{
    public function index(User $user)
    {
        return $this->success(data: UserResource::collection($user->fans));
    }
}
