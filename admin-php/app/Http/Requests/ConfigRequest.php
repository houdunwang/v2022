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
            'site.logo' => ['required'],
            'code.expire' => ['required', 'numeric']
        ];
    }

    public function attributes()
    {
        return [
            'site.title' => '站点名称',
            'site.copyright' => '版权信息',
            'site.logo' => '网站标志',
            'code.expire' => '验证码有效期'
        ];
    }
}
