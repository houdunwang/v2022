<?php

namespace App\Http\Controllers;

use App\Http\Requests\ForgetPasswordRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

/**
 * 找回密码
 * @package App\Http\Controllers
 */
class ForgetPasswordController extends Controller
{
    public function __invoke(ForgetPasswordRequest $request)
    {
        $user = User::where(app('user')->fieldName(), $request->account)->first();
        $user->password = bcrypt($request->password);
        $user->save();

        return $this->success('密码修改成功', [
            'user' => new UserResource($user->refresh()),
            'token' => $user->createToken('auth')->plainTextToken
        ]);
    }
}
