<?php

namespace App\Services;

use App\Models\User;
use App\Notifications\EmailValidateCodeNotification;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Notification;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CodeService
{
    /**
     * 统一发送接口
     * @param string|int $account
     * @return void
     * @throws HttpException
     * @throws NotFoundHttpException
     */
    public function send(string|int $account)
    {
        $action = filter_var($account, FILTER_VALIDATE_EMAIL) ? 'email' : 'mobile';
        if ($cache = Cache::get($account)) {
            $diff = $cache['sendTime']->diffInSeconds(now());
            $timeout = config('system.code.timeout');
            if ($diff <= $timeout) {
                abort(403, "验证码不允许重复发送,请稍" . ($timeout - $diff) . "秒后再试");
            }
        }

        return $this->$action($account);
    }

    /**
     * 邮箱验证码
     * @return void
     */
    public function email(string $email): int
    {
        $user = User::factory()->make(['email' => $email]);
        Notification::send($user, new EmailValidateCodeNotification($code = $this->getCode()));
        $this->cache($email, $code);
        return $code;
    }

    /**
     * 手机发送验证码
     * @return void
     */
    protected function mobile($phone)
    {
        app('sms')->send($phone, 'SMS_12840367', [
            'code' => $code = $this->getCode(),
            'product' => config('app.name')
        ]);
        $this->cache($phone, $code);
        return $code;
    }

    protected function cache(string $account, int $code)
    {
        Cache::put($account, ['code' => $code, 'sendTime' => now()], config('system.code.expire'));
    }
    /**
     * 验证码
     * @return int
     */
    protected function getCode(): int
    {
        return rand(pow(10, config('system.code.length') - 1), pow(10, config('system.code.length'))) - 1;
    }

    public function check($account,  $code): bool
    {
        if ($cache = Cache::get($account)) {
            return $cache['code'] == $code;
        }
        return false;
    }

    public function clear($account): void
    {
        Cache::forget($account);
    }
}
