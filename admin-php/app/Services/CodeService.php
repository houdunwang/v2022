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
        if (!config('app.debug') &&  Cache::get($account)) abort(403, '验证码不允许重复发送');

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
        Cache::put($email, $code, config('hd.code_expire_time'));
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
        return $code;
    }

    /**
     * 验证码
     * @return int
     */
    protected function getCode(): int
    {
        return mt_rand(1000, 9999);
    }


    public function check($account,  $code): bool
    {
        return Cache::get($account) == $code;
    }

    public function clear($account): void
    {
        Cache::forget($account);
    }
}
