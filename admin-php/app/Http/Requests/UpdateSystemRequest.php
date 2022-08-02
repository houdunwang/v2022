<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSystemRequest extends FormRequest
{
    public function authorize()
    {
        return is_super_admin();
    }

    public function rules()
    {
        return [
            'title' => ['required'],
            'logo' => ['required', 'url'],
            'config.avatar.width' => ['required', 'numeric'],
            'config.avatar.height' => ['required', 'numeric'],
            'config.upload.size' => ['required', 'numeric'],
            'config.upload.mimes' => ['required'],
            'config.code.expire' => ['required', 'numeric'],
            'config.code.length' => ['required', 'numeric'],
            'config.code.timeout' => ['required', 'numeric'],
        ];
    }

    public function attributes()
    {
        return [
            'title' => '站点名称',
            'logo' => '网站标志',
            'config.avatar.width' => '头像宽度',
            'config.avatar.height' => '头像高度',
            'config.upload.size' => '上传文件大小',
            'config.upload.mimes' => '文件类型',
            'config.code.expire' => '验证码有效期',
            'config.code.length' => '验证码数量',
            'config.code.timeout' => '验证码超时时间',
        ];
    }
}
