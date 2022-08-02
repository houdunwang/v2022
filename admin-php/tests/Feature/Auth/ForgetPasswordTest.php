<?php

namespace Tests\Feature\Auth;

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
        $response = $this->post('/api/account/forget-password', ['code' => 23]);

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
        $codeResponse = $this->postJson('/api/code/send', [
            'account' => $this->user->email
        ]);

        $response = $this->postJson('/api/account/forget-password', [
            'account' => $this->user->email,
            'code' => $codeResponse['data'],
            'password' => 'admin999',
            'password_confirmation' => 'admin999'
        ]);

        $response->assertSuccessful()->assertJson(['status' => 'success']);
    }
}
