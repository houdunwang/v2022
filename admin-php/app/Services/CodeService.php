<?php

namespace App\Services;

use App\Models\User;
use App\Notifications\EmailValidateCodeNotification;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Notification;

class CodeService
{
    protected $account;

    public function send(string|int $account)
    {
        $this->account = $account;

        $action = filter_var($account, FILTER_VALIDATE_EMAIL) ? 'email' : 'mobile';
        if (Cache::get($this->account)) abort(403, '验证码已经发送');

        $this->$action();
    }

    /**
     * 邮箱验证码
     * @return void
     */
    protected function email()
    {
        $code = mt_rand(1000, 9999);
        Cache::put($this->account, $code);
        $user = User::factory()->make(['email' => $this->account]);
        Notification::send($user, new EmailValidateCodeNotification($code));
    }

    /**
     * 手机发送验证码
     * @return void
     */
    protected function mobile()
    {
    }
}
