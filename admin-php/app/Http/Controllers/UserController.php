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
        return $this->success(data: new UserResource(Auth::user()));
    }

    public function index()
    {
        $users = User::when(request('content'), function ($query, $content) {
            $query->where(request('key'), $content);
        })->paginate(10);
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
