<?php

namespace App\Http\Requests;

use App\Models\User;
use Hash;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class LoginRequest extends FormRequest
{
    public function rules()
    {
        return [
            'account' => [...$this->accountRule(), Rule::exists('users', $this->fieldName())],
            'password' => [
                'required', 'min:3',
                function ($attribute, $value, $fail) {
                    $user = User::where($this->fieldName(), request('account'))->first();
                    if ($user && !Hash::check($value, $user->password)) {
                        $fail('密码输入错误');
                    }
                },
            ],
        ];
    }

    public function withValidator($validator)
    {
        //本地开发或存在captcha_code字段时，添加验证规则
        $validator->sometimes('captcha_code', 'required|captcha_api:' . request('captcha_key') . ',math', function ($input) {
            return app()->environment() == 'production' || request()->has('captcha_code');
        });
    }

    //登录帐号
    protected function fieldName()
    {
        return filter_var(request('account'), FILTER_VALIDATE_EMAIL) ? 'email' : 'mobile';
    }

    //登录帐号验证规则
    protected function accountRule()
    {
        switch ($this->fieldName()) {
            case 'email':
                return ['email'];
            case 'mobile':
                return ['required', 'regex:/^\d{11}$/'];
        }
    }

    public function messages()
    {
        return [
            'captcha_code.captcha_api' => '验证码输入错误'
        ];
    }
}
