<?php

namespace Tests\Feature\Account;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\App;
use Tests\TestCase;
use App\Models\User;

class ForgetPasswordTest extends TestCase
{
    use RefreshDatabase;
    /**
     * 验证表单
     * @test
     */
    public function validateForm()
    {
        $response = $this->post('/api/account/forget-password', []);

        $response->assertSessionHasErrors(['account', 'code', 'password']);
    }

    /**
     * 帐号不存在
     * @test
     */
    public function accountDoesNotExist()
    {
        $user = make(User::class);
        $response = $this->post('/api/account/forget-password', [
            'account' => $user->email
        ]);

        $response->assertSessionHasErrors(['account']);
    }

    /**
     * 找回密码
     * @test
     */
    public function retrievePassword()
    {
        $user = create(User::class);
        $codeResponse = $this->postJson('/api/code/send', [
            'account' => $user->email
        ]);

        $response = $this->postJson('/api/account/forget-password', [
            'account' => $user->email,
            'code' => $codeResponse['code'],
            'password' => 'admin88843983249834',
            'password_confirmation' => 'admin88843983249834'
        ]);
        $response->assertOk();
    }
}
