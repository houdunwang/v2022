<?php

namespace App\Services;

use Illuminate\Contracts\Container\BindingResolutionException;

class UserService
{
    /**
     * 登录要使用的字段
     * @return string
     * @throws BindingResolutionException
     */
    public function fieldName()
    {
        return filter_var(request('account'), FILTER_VALIDATE_EMAIL) ? 'email' : 'mobile';
    }
}
