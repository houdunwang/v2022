<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function rules()
    {
        return [
            'account' => $this->accountRule(),
            'password' => ['required', 'min:3', 'confirmed']
        ];
    }

    protected function accountRule()
    {
        if (filter_var(request('account'), FILTER_VALIDATE_EMAIL)) {
            return 'required|email|unique:users,email';
        }

        return ['required', 'regex:/^\d{11}$/', 'unique:users,mobile'];
    }
}
