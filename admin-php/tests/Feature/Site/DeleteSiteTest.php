<?php

namespace Tests\Feature\Site;

use App\Models\Site;
use App\Models\User;
use Auth;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DeleteSiteTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * 未登录用户不允许删除站点
     * @test
     */
    public function notLoggedInUserIsNotAllowedToDeleteSites()
    {
        Auth::logout();
        $this->deleteJson('/api/site/' . $this->site->id)->assertStatus(401);
    }

    /**
     * 成功删除站点
     * @test
     */
    public function deletedSuccessfullySite()
    {
        $this->deleteJson('/api/site/' . $this->site->id)->assertStatus(200);
    }

    /**
     * 普通用户不能删除他人站点
     * @test
     */
    public function ordinaryUsersCantDeleteOthersSites()
    {
        $this->signIn(User::find(2));

        $this->deleteJson("/api/site/{$this->site->id}")->assertStatus(403);
    }
}
