<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreModuleRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => ['required'],
            'name' => ['required'],
            'version' => ['required'],
            'author' => ['required'],
        ];
    }

    public function attributes()
    {
        return ['title' => '模块名称', 'name' => '模块标识', 'version' => '版本号', 'author' => '作者'];
    }
}
