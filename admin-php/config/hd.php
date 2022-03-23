<?php
$xj = include __DIR__ . '/xj.php';

return [
    'mobile' => $xj['mobile'],
    'code_expire_time' => env('CODE_EXPIRE_TIME', 3),
    'aliyun' => [
        'access_key_id' => env('ALIYUN_ACCESS_KEY_ID'),
        'access_key_secret' => env('ALIYUN_ACCESS_KEY_SECRET'),
        'sms_sign_name' => env('ALIYUN_SMS_SING_NAME')
    ]
];
