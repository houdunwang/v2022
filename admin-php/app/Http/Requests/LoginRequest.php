<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function rules()
    {
        return [
            'account' => $this->accountRule(),
            'password' => ['required', 'min:3'],
            'captcha_code' => 'required|captcha_api:' . request('captcha_key') . ',math'
        ];
    }

    protected function accountRule()
    {
        if (filter_var(request('account'), FILTER_VALIDATE_EMAIL)) {
            return 'required|email';
        }

        return ['required', 'regex:/^\d{11}$/'];
    }

    public function messages()
    {
        return ['captcha_code.captcha_api' => '验证码输入错误'];
    }
}
