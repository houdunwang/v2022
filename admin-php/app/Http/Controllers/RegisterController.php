<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function __invoke(RegisterRequest $request, UserService $userService)
    {
        $user = User::create([
            $userService->fieldName() => $request->account,
            'password' => Hash::make($request->password),
        ]);

        return $this->success(data: [
            'user' => new UserResource($user->refresh()),
            'token' => $user->createToken('auth')->plainTextToken
        ]);
    }
}
