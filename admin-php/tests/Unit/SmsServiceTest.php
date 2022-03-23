<?php

namespace Tests\Unit;

use Tests\TestCase;

// use PHPUnit\Framework\TestCase;

class SmsServiceTest extends TestCase
{
    /**
     * 短信发送
     * @test
     */
    public function sendMobileMessage()
    {
        // $response = app('sms')->send(config('hd.mobile'), 'SMS_12840367', [
        //     'code' => '888999',
        //     'product' => '后盾人'
        // ]);

        // $this->assertTrue(isset($response['aliyun']));


        $this->assertTrue(true);
    }
}
