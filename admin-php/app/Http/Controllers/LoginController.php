<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Contracts\Validation\Validator as ValidationValidator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Validator;

class LoginController extends Controller
{
    public function __invoke(LoginRequest $request)
    {
        $user  = User::where('email', $request->email)->first();

        if (!$user) {
            throw ValidationException::withMessages([
                'email' => '用户不存在',
            ]);
        }

        if (!Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'password' => '密码输入错误'
            ]);
        }

        return [
            'user' => $user,
            'token' =>  $user->createToken('auth')->plainTextToken
        ];
    }
}
