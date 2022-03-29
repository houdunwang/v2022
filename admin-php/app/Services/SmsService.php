<?php

namespace App\Services;

use Illuminate\Contracts\Container\BindingResolutionException;
use Overtrue\EasySms\EasySms;
use Overtrue\EasySms\Exceptions\InvalidArgumentException;
use Overtrue\EasySms\Exceptions\NoGatewayAvailableException;
use Psr\Container\NotFoundExceptionInterface;
use Psr\Container\ContainerExceptionInterface;

class SmsService
{
    /**
     * 发送短信
     * @param mixed $phone
     * @param string $templateCode
     * @param array $templateParam
     * @return array
     * @throws BindingResolutionException
     * @throws NotFoundExceptionInterface
     * @throws ContainerExceptionInterface
     * @throws InvalidArgumentException
     * @throws NoGatewayAvailableException
     */
    public function send($phone, string $templateCode, array $templateParam)
    {
        $sms = new EasySms($this->config());

        return $sms->send($phone, [
            //短信模板
            'template' => $templateCode,
            //模板变量
            'data' => $templateParam
        ]);
    }

    /**
     * 配置项
     * @return array
     * @throws BindingResolutionException
     * @throws NotFoundExceptionInterface
     * @throws ContainerExceptionInterface
     */
    protected function config(): array
    {
        return [
            // HTTP 请求的超时时间（秒）
            'timeout' => 5.0,
            // 默认发送配置
            'default' => [
                // 网关调用策略，默认：顺序调用
                'strategy' => \Overtrue\EasySms\Strategies\OrderStrategy::class,
                // 默认可用的发送网关
                'gateways' => ['aliyun'],
            ],
            // 可用的网关配置
            'gateways' => [
                'errorlog' => [
                    'file' => './easy-sms.log',
                ],
                'aliyun' => [
                    'access_key_id' => config('system.aliyun.access_key_id'),
                    'access_key_secret' => config('system.aliyun.access_key_secret'),
                    'sign_name' => config('system.aliyun.sms_sign_name'),
                ],
            ],
        ];
    }
}
