<?php
return [
    //验证码
    'code' => [
        'expire' => env('CODE_EXPIRE_TIME', 600),
        'timeout' => env('CODE_TIMEOUT_TIME', 60),
        'length' => env('CODE_LENGTH', 4),
    ],
    //阿里云
    'aliyun' => [
        'access_key_id' => env('ALIYUN_ACCESS_KEY_ID'),
        'access_key_secret' => env('ALIYUN_ACCESS_KEY_SECRET'),
        'sms_sign_name' => env('ALIYUN_SMS_SING_NAME')
    ],
    //用户头像裁切
    "avatar" => [
        'width' => env('AVATAR_CROP_WIDTH', 500),
        'height' => env('AVATAR_CROP_HEIGHT', 100),
    ],
    //文件上传
    "upload" => [
        "size" => 2000,
        "mimes" => "doc,pdf"
    ]
];
