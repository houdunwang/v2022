<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class StoreRoleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => ['required', Rule::unique('roles')->where('site_id', request('site.id'))],
            'name' => ['required', 'regex:/^[a-z]+$/i',  Rule::unique('roles')->where('site_id', request('site.id'))],
        ];
    }

    public function attributes()
    {
        return ['title' => '角色名称', 'name' => '角色标识'];
    }
}
