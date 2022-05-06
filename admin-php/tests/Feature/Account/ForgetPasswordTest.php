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
        $response = $this->postJson('/api/account/forget-password', []);

        $response->assertJsonValidationErrors(['account', 'password']);
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

        $response = $this->postJson('/api/account/forget-password', [
            'account' => $user->email,
            'password' => 'admin88843983249834',
            'password_confirmation' => 'admin88843983249834'
        ]);

        $response->assertOk();
    }
}
