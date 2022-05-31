<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConfigRequest extends FormRequest
{
    public function authorize()
    {
        return is_super_admin();
    }

    public function rules()
    {
        return [
            'site.title' => ['required'],
            'site.copyright' => ['required'],
            'site.logo' => ['required']
        ];
    }

    public function attributes()
    {
        return [
            'site.title' => '站点名称',
            'site.copyright' => '版权信息',
            'site.logo' => '网站标志'
        ];
    }
}
