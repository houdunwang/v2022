<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class CodeExistUserRequest extends FormRequest
{
    public function rules()
    {
        return [
            'account' => ['required', $this->accountRule(), 'exists:users,' . $this->fieldName()]
        ];
    }

    protected function accountRule()
    {
        return $this->fieldName() == 'email' ? 'email' : 'regex:/^\d{11}$/';
    }

    protected function fieldName()
    {
        return filter_var(request('account'), FILTER_VALIDATE_EMAIL) ? 'email' : 'mobile';
    }
}
