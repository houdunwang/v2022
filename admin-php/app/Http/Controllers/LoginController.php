<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Contracts\Validation\Validator as ValidationValidator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Validator;

class LoginController extends Controller
{
    /**
     * 自动执行的函数
     * @param LoginRequest $request
     * @return array
     * @throws ValidationException
     */
    public function __invoke(LoginRequest $request, UserService $userService)
    {
        $user = User::where($userService->fieldName(), $request->account)->first();

        return $this->success(data: [
            'user' => new UserResource($user),
            'token' =>  $user->createToken('auth')->plainTextToken
        ]);
    }
}
