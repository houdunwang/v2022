<?php

namespace Tests\Feature\Admin;

use App\Models\Admin;
use App\Models\Site;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class delSiteAdminTest extends TestCase
{
    use RefreshDatabase;
    protected $site;

    /**
     * 添加站点管理员
     * @test
     */
    public function delSiteAdmin()
    {
        $this->site->admins()->attach($this->user->id);

        $response = $this->deleteJson("/api/site/{$this->site->id}/admin/{$this->user->id}");

        $response->assertStatus(200)->assertJson(['status' => 'success']);
    }
}
