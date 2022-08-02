<?php

namespace App\Http\Requests;

use App\Rules\ValidateCodeRule;
use Illuminate\Foundation\Http\FormRequest;

/**
 * 找回密码
 * @package App\Http\Requests
 */
class ForgetPasswordRequest extends FormRequest
{
    public function rules()
    {
        return [
            'account' => $this->accountRule(),
            'password' => ['required', 'confirmed', 'min:3']
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
        if (filter_var(request('account'), FILTER_VALIDATE_EMAIL)) {
            return 'required|email|exists:users,email';
        }

        return ['required', 'regex:/^\d{11}$/', 'exists:users,mobile'];
    }
}
