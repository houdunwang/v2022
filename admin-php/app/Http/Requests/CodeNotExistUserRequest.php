<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class CodeNotExistUserRequest extends FormRequest
{
    public function rules()
    {
        return [
            'account' => ['required', $this->accountRule(), $this->checkUserNoExists()]
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

    protected function checkUserNoExists()
    {
        return function ($validate, $value, $fail) {
            $isExist = User::where($this->fieldName(), $value)->exists();
            if ($isExist) {
                $fail('该账号已存在');
            }
        };
    }
}
