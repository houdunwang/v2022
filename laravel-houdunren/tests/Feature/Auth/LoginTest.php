<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    /**
     * 手机号不存在
     * @test
     * @return void
     */
    public function PhoneNumberDoesNotExist()
    {
        $response = $this->postJson('api/auth/login', [
            'mobile' => '19999999999',
            'password' => 'admin888'
        ]);

        $response->assertJsonValidationErrorFor('mobile');
    }

    /**
     * 密码输入错误
     * @test
     * @return void
     */
    public function ThePasswordInputError()
    {
        $user = $this->create(User::class, null, ['mobile' => 19999999999]);

        $response = $this->postJson('api/auth/login', [
            'mobile' => $user->mobile,
            'password' => 'admin88811'
        ]);

        $response->assertJsonValidationErrorFor('password');
    }

    /**
     * 手机号不能为空
     * @test
     * @return void
     */
    public function  PhoneNumberCannotBeEmpty()
    {
        $response = $this->postJson('api/auth/login');

        $response->assertJsonValidationErrors(['mobile']);
    }
}
