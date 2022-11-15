<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Rules\CodeRule;
use App\Rules\PhoneRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        Validator::make($request->input(), [
            "mobile" => ['required', new PhoneRule(), Rule::exists('users')],
            "captcha" => app()->environment('local') ? [] : ['required', 'captcha']
        ], ['captcha.captcha' => '验证码输入错误'])->validate();

        $user = User::where('mobile', $request->mobile)->first();
        if ($user && Hash::check($request->password, $user->password)) {
            Auth::guard('web')->login($user);
            return $this->success('登录成功', ['token' => $user->createToken('auth')->plainTextToken, 'user' => $user]);
        }

        throw ValidationException::withMessages(['password' => '密码输入错误']);
    }

    public function register(Request $request, User $user)
    {
        Validator::make($request->input(), [
            'mobile' => ['required', Rule::unique('users')],
            'password' => ['required', 'confirmed'],
            'code' => ['required', new CodeRule()]
        ])->validate();

        $user->fill($request->input());
        $user->password = Hash::make($request->password);
        $user->save();

        return $this->success('登录成功', ['token' => $user->createToken('auth')->plainTextToken]);
    }

    public function logout()
    {
        if ($user = Auth::user()) {
            Auth::guard('web')->logout();
            $user->tokens()->delete();
        }
    }

    public function password(Request $request)
    {
        $request->validate([
            'mobile' => ['required', Rule::exists('users', 'mobile')],
            'code' => ['required', new CodeRule()],
            'password' => ['required', 'confirmed'],
        ]);
        $user = User::whereMobile($request->mobile)->first();
        $user->password = Hash::make($request->password);
        $user->save();
        Auth::guard('web')->login($user);
        return $this->success('密码重置成功');
    }
}
