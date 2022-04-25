<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mews\Captcha\Captcha;

class CaptchaController extends Controller
{
    public function __invoke(Captcha $captcha, string $config = 'default')
    {
        return $this->success(data: $captcha->create($config, true));
    }
}
