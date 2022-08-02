<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SmsServiceTest extends TestCase
{
    use RefreshDatabase;

    /**
     * 短信发送
     * @test
     */
    public function sendMobileMessage()
    {
        if (env('MOBILE')) {
            $response = app('sms')->send($this->user->mobile, 'SMS_12840367', [
                'code' => '888999',
                'product' => '后盾人'
            ]);

            $this->assertTrue(isset($response['aliyun']));
        }
        $this->assertTrue(true);
    }
}
