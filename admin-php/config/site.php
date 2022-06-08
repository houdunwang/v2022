<?php
return [
    'site' => [
        "address" => '',
        "email" => '',
        "copyright" => '后盾人每晚八点直播 -  不见不散'
    ],
    'aliyun' => [
        'access_key_id' => env('ALIYUN_ACCESS_KEY_ID'),
        'access_key_secret' => env('ALIYUN_ACCESS_KEY_SECRET'),
        'sms_sign_name' => env('ALIYUN_SMS_SING_NAME')
    ],
];
