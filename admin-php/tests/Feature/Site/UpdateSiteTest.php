<?php

namespace Tests\Feature\Site;

use App\Models\Site;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UpdateSiteTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * 表单字段验证
     * @test
     */
    public function formFieldValidation()
    {
        $response = $this->putJson('/api/site/' . $this->site->id, [
            'title' => '',
            'url' => $this->faker()->word()
        ])->assertStatus(422);

        $response->assertJsonValidationErrors(['title', 'url']);
    }

    /**
     * 站点标题不能重复
     * @test
     */
    public function siteTitleCannotBeRepeated()
    {
        $response = $this->putJson('/api/site/' . $this->site->id, [
            'title' => Site::find(2)->title,
        ])->assertStatus(422);

        $response->assertJsonValidationErrors(['title']);
    }

    /**
     * 成功更新站点
     * @test
     */
    public function successfulUpdateSite()
    {
        $this->putJson('/api/site/' . $this->site->id, [
            'title' => $this->faker()->word()
        ])->assertStatus(200);
    }

    /**
     * 不能更新别人的站点
     * @test
     */
    public function cantUpdateSiteToOthers()
    {
        $this->signIn(User::find(2));
        $this->putJson('/api/site/1', ['title' => $this->faker()->word()])->assertStatus(403);
    }
}
