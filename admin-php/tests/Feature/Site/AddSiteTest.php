<?php

namespace Tests\Feature\Site;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AddSiteTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();
        $this->signIn();
    }
    /**
     * 表单验证
     * @test
     */
    public function formValidation()
    {
        $response = $this->postJson('/api/site', ['url' => "3838", 'email' => 'a']);

        $response->assertJsonValidationErrors(['title', 'url', 'email']);
    }

    /**
     * 网站名称不能重复
     * @test
     */
    public function webSiteNameCannotBeRepeated()
    {
        $site = create('App\Models\Site', null, ['user_id' => $this->user->id]);

        $response = $this->postJson('/api/site', ['title' => $site->title]);

        $response->assertJsonValidationErrors(['title']);
    }

    /**
     * 成功添加站点
     * @test
     */
    public function addASiteToSuccess()
    {
        $response = $this->postJson('/api/site', ['title' => $this->faker()->sentence(3)]);

        $response->assertSuccessful()->assertJson(['status' => 'success']);
    }
}
