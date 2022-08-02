<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CodeRequest extends FormRequest
{
    public function rules()
    {
        return [
            'account' => $this->accountRule(),
        ];
    }

    protected function accountRule()
    {
        if (filter_var(request('account'), FILTER_VALIDATE_EMAIL)) {
            return ['required', 'email'];
        }

        return ['required', 'regex:/^\d{11}$/'];
    }
}
