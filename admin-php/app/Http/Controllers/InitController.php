<?php

namespace App\Http\Controllers;

use App\Models\Config;
use Illuminate\Http\Request;

//网站初始数据
class InitController extends Controller
{
    public function __invoke()
    {
        return $this->success(data: [
            "config" => config('system.site')
        ]);
    }
}
