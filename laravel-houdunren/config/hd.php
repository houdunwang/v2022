<?php
return [
    "aliyun" => [
        'aliyun_key' => env('ALIYUN_KEY', 'sss'),
        'aliyun_secret' => env('ALIYUN_SECRET'),
        'aliyun_code_sign' => env('ALIYUN_CODE_SIGN'),
        'aliyun_code_template' => env("ALIYUN_CODE_TEMPLATE"),
        "aliyun_oss_bucket" => env('ALIYUN_OSS_BUCKET')
    ],
    "code" => [
        "timeout" => env('CODE_SEND_TIMEOUT', 600)
    ],
    "upload" => [
        'type' => 'local'
    ],
    "wechat" => [
        "appid" => env('WECHAT_APPID'),
        "appsecret" => env('WECHAT_SECRET'),
        "token" => env('WECHAT_TOKEN')
    ],
    "subscribe" => [
        "price" => 375
    ]

];
