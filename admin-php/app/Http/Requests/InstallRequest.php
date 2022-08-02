<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InstallRequest extends FormRequest
{
    public function rules()
    {
        return [
            'database.database' => ['required'],
            'database.host' => ['required']
        ];
    }
    public function attributes()
    {
        return [
            'database.database' => '数据库',
            'database.host' => '主机地址'
        ];
    }
}
