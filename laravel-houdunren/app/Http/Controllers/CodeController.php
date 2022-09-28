<?php

namespace App\Http\Controllers;

use App\Rules\PhoneRule;
use App\Services\AliyunService;
use App\Services\CodeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CodeController extends Controller
{
    public function send(Request $request)
    {
        Validator::make(
            $request->input(),
            ['mobile' => ['required', new PhoneRule()]]
        )->validate();

        app(CodeService::class)->send($request->input('mobile'));
        return "验证码发送成功";
    }
}
