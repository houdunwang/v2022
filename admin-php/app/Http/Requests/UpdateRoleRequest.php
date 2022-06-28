<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateRoleRequest extends FormRequest
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

    public function rules()
    {
        return [
            'name' => ['required', 'regex:/^[a-z]+$/i', $this->uniqueFilter('name')],
            'title' => ['required', $this->uniqueFilter('title')]
        ];
    }

    protected function uniqueFilter($field)
    {
        return Rule::unique('roles', $field)->where('site_id', request('site.id'))
            ->whereNotIn('id', [request('role.id')]);
    }
}
