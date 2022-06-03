<?php
return [
    'site' => [
        "title" => "后盾人",
        "logo" => '',
        "copyright" => '后盾人每晚八点直播 -  不见不散'
    ],
    'code' => [
        'expire' => env('CODE_EXPIRE_TIME', 10),
        'timeout' => env('CODE_TIMEOUT_TIME', 60),
        'length' => env('CODE_LENGTH', 6),
    ],
    'aliyun' => [
        'access_key_id' => env('ALIYUN_ACCESS_KEY_ID'),
        'access_key_secret' => env('ALIYUN_ACCESS_KEY_SECRET'),
        'sms_sign_name' => env('ALIYUN_SMS_SING_NAME')
    ],
    "avatar" => [
        # 用户头像尺寸
        'avatar_crop_width' => env('AVATAR_CROP_WIDTH', 500),
        'avatar_crop_height' => env('AVATAR_CROP_HEIGHT', 100),
    ]
];
