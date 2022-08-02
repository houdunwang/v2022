<?php

namespace App\Rules;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Contracts\Validation\Rule;

/**
 * 验证码规则
 * @package App\Rules
 */
class ValidateCodeRule implements Rule
{
    public function __construct()
    {
    }

    /**
     * 确定验证规则是否通过
     * @param string $attribute
     * @param mixed $value
     * @return bool
     * @throws BindingResolutionException
     */
    public function passes($attribute, $value)
    {
        return request('account') && $value && app('code')->check(request('account'), $value);
    }

    /**
     * 验证失败消息
     * @return string
     */
    public function message()
    {
        return  '验证码输入错误';
    }
}
