<?php

namespace App\Http\Requests;

use App\Rules\ValidateCodeRule;
use Illuminate\Foundation\Http\FormRequest;

class ForgetPasswordRequest extends FormRequest
{
    public function rules()
    {
        return [
            'account' => $this->accountRule(),
            'code' => ['required', new ValidateCodeRule],
            'password' => ['required', 'confirmed', 'min:3']
        ];
    }

    protected function accountRule()
    {
        if (filter_var(request('account'), FILTER_VALIDATE_EMAIL)) {
            return 'required|email|exists:users,email';
        }

        return ['required', 'regex:/^\d{11}$/', 'exists:users,mobile'];
    }
}
