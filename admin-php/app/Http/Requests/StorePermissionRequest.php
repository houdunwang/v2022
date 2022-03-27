<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePermissionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }
    public function rules()
    {
        return [
            'name' => ['required', 'unique:permissions,name'],
            'title' => ['required', Rule::unique('permissions', 'title')],
        ];
    }
}
