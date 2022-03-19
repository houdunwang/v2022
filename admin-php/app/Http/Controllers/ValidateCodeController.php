<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidateCodeRequest;
use App\Models\User;
use App\Notifications\EmailValidateCodeNotification;
use App\Services\CodeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class ValidateCodeController extends Controller
{
    public function guest(ValidateCodeRequest $request, CodeService $codeService)
    {
        $code = $codeService->send($request->account);
        return response(['message' => '验证码发送成功', 'code' => $code]);
    }
}
