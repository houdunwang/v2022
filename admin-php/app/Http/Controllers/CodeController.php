<?php

namespace App\Http\Controllers;

use App\Http\Requests\CodeExistUserRequest;
use App\Http\Requests\CodeNotExistUserRequest;
use App\Http\Requests\CodeRequest;
use App\Http\Requests\ValidateCodeRequest;
use App\Models\User;
use App\Notifications\EmailValidateCodeNotification;
use App\Services\CodeService;
use Illuminate\Http\JsonResponse;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CodeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum'])->only(['user']);
    }

    public function send(CodeRequest $request, CodeService $codeService)
    {
        $codeService->send($request->account);
        return $this->success('验证码发送成功');
    }

    public function user(string $type, CodeService $codeService)
    {
        $codeService->send(Auth::user()[$type == 'email' ? 'email' : 'mobile']);
        return $this->success('验证码发送成功');
    }

    /**
     * 不存在的用户发送验证码
     * @param CodeNotExistUserRequest $request
     * @param CodeService $codeService
     * @return JsonResponse
     * @throws HttpException
     * @throws NotFoundHttpException
     * @throws BindingResolutionException
     */
    public function notExistUser(CodeNotExistUserRequest $request, CodeService $codeService)
    {
        $codeService->send($request->account);
        return $this->success('验证码发送成功');
    }

    public function existUser(CodeExistUserRequest $request, CodeService $codeService)
    {
        $codeService->send($request->account);
        return $this->success('验证码发送成功');
    }
}
