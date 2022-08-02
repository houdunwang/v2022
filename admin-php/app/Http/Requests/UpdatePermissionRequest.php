<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdatePermissionRequest extends FormRequest
{
    public function authorize()
    {
        return Auth::check();
    }

    public function rules()
    {
        return [
            'name' => ['required', Rule::unique('permissions')->ignore($this->request->get('id'))],
            'title' => ['required', Rule::unique('permissions')->ignore($this->request->get('id'))],
        ];
    }
}
