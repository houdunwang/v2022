<?php

namespace App\Services;

use App\Models\User;
use App\Notifications\EmailValidateCodeNotification;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Notification;
use Psr\Container\NotFoundExceptionInterface;
use Psr\Container\ContainerExceptionInterface;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * 验证码服务
 * @package App\Services
 */
class CodeService
{
    // 统一发送接口
    public function send(string|int $account)
    {
        $action = filter_var($account, FILTER_VALIDATE_EMAIL) ? 'email' : 'mobile';

        if ($cache = Cache::get($account)) {
            $diff = $cache['sendTime']->diffInSeconds(now());
            $timeout = config('system.code.timeout');
            if ($diff <= $timeout) {
                $time = $timeout - $diff;
                abort(403, "请勿频繁发送验证码，请{$time}秒后再操作");
            }
        };

        return $this->$action($account);
    }

    //发送邮件验证码
    public function email(string $email): int
    {
        $user = User::factory()->make(['email' => $email]);
        Notification::send($user, new EmailValidateCodeNotification($code = $this->getCode()));

        $this->cache($email, $code);
        return $code;
    }

    //发送短信验证码
    protected function mobile(string $phone)
    {
        app('sms')->send($phone, 'SMS_12840367', [
            'code' => $code = $this->getCode(),
            'product' => config('app.name')
        ]);

        $this->cache($phone, $code);

        return $code;
    }

    // 缓存验证码
    protected function cache(string $account, int $code): void
    {
        Cache::put($account, ['code' => $code, 'sendTime' => now()], 600);
    }

    // 验证码
    protected function getCode(): int
    {
        return rand(pow(10, config('system.code.length') - 1), pow(10, config('system.code.length')) - 1);
    }

    // 校对验证码
    public function check(string $account, string $code): bool
    {
        return (Cache::get($account)['code'] ?? '') == $code;
    }

    // 清除验证码
    public function clear(string $account): void
    {
        Cache::forget($account);
    }
}
