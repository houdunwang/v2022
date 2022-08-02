<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UploadImageRequest extends FormRequest
{
    public function authorize()
    {
        return Auth::check();
    }

    public function rules()
    {
        return [
            'file' => ['required', 'image', 'max:2000'],
        ];
    }

    public function attributes()
    {
        return ['file' => '图片文件'];
    }
}
