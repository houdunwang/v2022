<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;

class CodeService
{
    public function send($phone): int
    {
        $code = $this->code($phone);
        if (app()->environment('testing')) return $code;
        app(AliyunService::class)->sms(
            config('hd.aliyun.aliyun_code_sign'),
            config('hd.aliyun.aliyun_code_template'),
            $phone,
            ["code" => $code, "product" => config('app.name')]
        );

        return $code;
    }

    protected function code($phone): int
    {
        if (Cache::get($phone)) abort(403, '请稍候再试');
        $code = mt_rand(1000, 9999);

        Cache::put($phone,  $code = mt_rand(1000, 9999), 600);

        return $code;
    }
}
