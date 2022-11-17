<?php

namespace App\Http\Controllers;

use App\Services\OssService;
use Illuminate\Http\Request;

class AttachmentController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum']);
    }

    public function image(Request $request)
    {
        $request->validate([
            'file' => ['required', 'image', 'max:2048']
        ], ['file.max' => '文件不能超过2MB']);
        $url = app(OssService::class)->image(request('file'));
        return $this->success('', ["url" => $url]);
    }
}
