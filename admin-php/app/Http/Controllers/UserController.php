<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function info()
    {
        $user = Auth::user()->load('roles.permissions');
        return $this->success(data: new UserResource($user));
    }

    public function index()
    {
        $users = User::paginate(10);

        return UserResource::collection($users);
    }


    public function show(User $user)
    {
        return $this->success(data: new UserResource($user));
    }


    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
    }
}
