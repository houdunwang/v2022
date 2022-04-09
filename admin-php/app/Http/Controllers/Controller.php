<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function success(string $message = '操作成功', $data = [], $code = 0)
    {
        return response()->json([
            'code' => $code,
            'status' => 'success',
            'message' => $message,
            'data' => $data
        ]);
    }
}
