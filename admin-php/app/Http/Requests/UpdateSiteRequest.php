<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateSiteRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title' => ['required', 'between:3,50', Rule::unique('sites', 'title')->ignore($this->site->id)],
            'url' => ['nullable', 'url'],
            'email' => ['nullable', 'email'],
            'address' => ['nullable', 'between:3,100'],
        ];
    }

    public function attributes()
    {
        return ['title' => '网站名称', 'url' => '网址'];
    }
}
