<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Rules\CodeRule;

class UserController extends Controller
{
    public function info()
    {
        if (Auth::check()) {
            return new UserResource(Auth::user());
        }
    }

    public function show(User $user)
    {
        return new UserResource($user);
    }

    public function update(Request $request, User $user)
    {
        Auth::user()->fill($request->input())->save();
        return $this->success('修改成功');
    }

    public function mobile(Request $request)
    {
        $request->validate([
            'mobile' => ['required'],
            'code' => ['required', new CodeRule()],
        ]);

        $user = Auth::user();
        $user->mobile = request('mobile');
        return $this->success('手机号绑定成功');
    }
}
