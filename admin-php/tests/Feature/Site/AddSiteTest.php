<?php

namespace Tests\Feature\Site;

use App\Models\Site;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AddSiteTest extends TestCase
{
    /**
     * 表单字段验证
     * @test
     */
    public function formFieldValidation()
    {
        $this->postJson('/api/site', [])->assertStatus(422)
            ->assertJsonValidationErrors(['title']);

        $this->postJson('/api/site', ['title' => 'a', 'url' => 'abc'])->assertStatus(422)
            ->assertJsonValidationErrors(['title']);
    }

    /**
     * 网站名称唯一
     * @test
     */
    public function webSiteNameOnly()
    {
        $this->postJson('/api/site', ['title' => 'xiangjun'])->assertSuccessful();
        $this->postJson('/api/site', ['title' => 'xiangjun'])
            ->assertStatus(422)
            ->assertJsonValidationErrors(['title']);
    }

    /**
     * 添加站点
     * @test
     */
    public function addNewSite()
    {
        $response = $this->postJson('/api/site', [
            'title' => $this->faker()->word(5),
            'url' => $this->faker()->url(),
            'email' => $this->faker()->email(),
            'address' => $this->faker()->sentence(),
            'tel' => $this->faker()->phoneNumber(),
        ]);

        $response->assertSuccessful();
    }

    /**
     * 普通用户不能添加站点
     * @test
     */
    public function ordinaryUsersCanNotAddSite()
    {
        $user = create(User::class);
        $response = $this->actingAs($user)->postJson('/api/site', [
            'title' => $this->faker()->word(5),
            'url' => $this->faker()->url(),
            'email' => $this->faker()->email(),
            'address' => $this->faker()->sentence(),
            'tel' => $this->faker()->phoneNumber(),
        ]);
        $response->assertStatus(403);
    }
}
