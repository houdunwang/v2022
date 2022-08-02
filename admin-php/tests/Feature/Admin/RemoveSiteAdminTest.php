<?php

namespace Tests\Feature\Admin;

use App\Models\Site;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RemoveSiteAdminTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->signIn();
    }

    /**
     * @test
     */
    public function removeSiteAdmin()
    {
        $site = create(Site::class, null, ['user_id' => $this->user->id]);

        $site->admins()->attach([$this->user->id]);

        $this->assertTrue($site->admins->contains($this->user));

        $response = $this->deleteJson("/api/site/{$site->id}/admin/{$this->user->id}");

        $response->assertStatus(200);

        $this->assertEquals(0, $site->refresh()->admins->count());
    }
}
