<?php

namespace App\Http\Requests;

use App\Rules\ValidateCodeRule;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function rules()
    {
        return [
            'account' => $this->accountRule(),
            'password' => ['required', 'min:3', 'confirmed'],
        ];
    }

    public function withValidator($validator)
    {
        $validator->sometimes('code', ['required', new ValidateCodeRule], function ($input) {
            return app()->environment() == 'production' || request('code');
        });
    }

    protected function accountRule()
    {
        if (filter_var(request('account'), FILTER_VALIDATE_EMAIL))
            return ['required', 'email', 'unique:users,email'];

        return ['required', 'regex:/^\d{11}$/', 'unique:users,mobile'];
    }

    public function messages()
    {
        return ['code.required' => '验证码不能为空'];
    }
}
