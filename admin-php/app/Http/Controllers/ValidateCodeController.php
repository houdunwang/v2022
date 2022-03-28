<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidateCodeRequest;
use App\Models\User;
use App\Notifications\EmailValidateCodeNotification;
use App\Services\CodeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class ValidateCodeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum'])->only(['user']);
    }

    public function send(ValidateCodeRequest $request, CodeService $codeService)
    {
        $code = $codeService->send($request->account);
        return response(['message' => '验证码发送成功', 'code' => $code]);
    }

    public function user(string $type, CodeService $codeService)
    {
        $code = $codeService->send(Auth::user()[$type == 'email' ? 'email' : 'mobile']);
        return response(['message' => '验证码发送成功', 'code' => $code]);
    }
}
