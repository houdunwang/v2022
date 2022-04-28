<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class LoginRequest extends FormRequest
{
    public function rules()
    {
        return [
            'account' => [...$this->accountRule(), Rule::exists('users', $this->fieldName())],
            'password' => [
                'required', 'min:3', function ($attribute, $value, $fail) {
                    $user = User::where($this->fieldName(), request('account'))->first();
                    if ($user && !Hash::check($value, $user->password)) {
                        $fail('密码输入错误');
                    }
                },
            ],
            'captcha_code' => 'sometimes|required|captcha_api:' . request('captcha_key') . ',math'
        ];
    }
    protected function fieldName()
    {
        return filter_var(request('account'), FILTER_VALIDATE_EMAIL) ? 'email' : 'mobile';
    }

    protected function accountRule()
    {
        switch ($this->fieldName()) {
            case 'email':
                return ['required', 'email'];
            case 'mobile':
                return ['required', 'regex:/^\d{11}$/'];
        }
    }

    public function messages()
    {
        return ['captcha_code.captcha_api' => '验证码输入错误'];
    }
}
