<?php

namespace App\Services;

use AlibabaCloud\SDK\Dysmsapi\V20170525\Dysmsapi;
use Darabonba\OpenApi\Models\Config;
use AlibabaCloud\SDK\Dysmsapi\V20170525\Models\SendSmsRequest;
use AlibabaCloud\Tea\Utils\Utils\RuntimeOptions;

class AliyunService
{
    /**
     * 使用AK&SK初始化账号Client
     * @param string $accessKeyId
     * @param string $accessKeySecret
     * @return Dysmsapi Client
     */
    public static function createClient()
    {
        $config = new Config([
            // 您的 AccessKey ID
            "accessKeyId" => config('hd.aliyun.aliyun_key'),
            // 您的 AccessKey Secret
            "accessKeySecret" => config('hd.aliyun.aliyun_secret')
        ]);
        // 访问的域名
        $config->endpoint = "dysmsapi.aliyuncs.com";
        return new Dysmsapi($config);
    }

    /**
     * @param string[] $args
     * @return void
     */
    public static function sms($sign, $template, $phone, $params)
    {
        $client = self::createClient(config('hd.aliyun.aliyun_key'), config('hd.aliyun.aliyun_secret'));
        $sendSmsRequest = new SendSmsRequest([
            "signName" => $sign,
            "templateCode" => $template,
            "phoneNumbers" => $phone,
            "templateParam" => json_encode($params)
        ]);
        $runtime = new RuntimeOptions([]);
        $client->sendSmsWithOptions($sendSmsRequest, $runtime);
    }
}
