<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class CodeSendToExistUserRequest extends FormRequest
{
    public function rules()
    {
        return [
            'account' => ['required',  $this->accountRule(), 'exists:users,' . $this->accountField()]
        ];
    }

    protected function accountRule()
    {
        return filter_var(request('account'), FILTER_VALIDATE_EMAIL) ? 'email' : 'regex:/^\d{11}$/';
    }

    protected function accountField()
    {
        return filter_var(request('account'), FILTER_VALIDATE_EMAIL) ? 'email' : 'mobile';
    }
}
