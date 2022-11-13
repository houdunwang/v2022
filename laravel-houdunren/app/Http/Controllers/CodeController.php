<?php

namespace App\Http\Controllers;

use App\Rules\PhoneRule;
use App\Services\AliyunService;
use App\Services\CodeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\RateLimiter;

class CodeController extends Controller
{
    public function send(Request $request)
    {
        Validator::make(
            $request->input(),
            ['mobile' => ['required', new PhoneRule()]]
        )->validate();

        if (RateLimiter::tooManyAttempts('send-message:' . request('mobile'), $perMinute = 1)) {
            $seconds = RateLimiter::availableIn('send-message:' . request('mobile'));
            abort(403, "请{$seconds}秒后再试");
        }

        RateLimiter::attempt('send-message:' . request('mobile'), $perMinute, function () {
        });
        $code = app(CodeService::class)->send($request->input('mobile'));
        return $this->success('验证码发送成功', ['code' => app()->environment('production') ? '' : $code]);
    }
}
