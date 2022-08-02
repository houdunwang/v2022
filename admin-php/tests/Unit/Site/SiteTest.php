<?php

namespace Tests\Unit\Site;

use App\Models\Site;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SiteTest extends TestCase
{
    use RefreshDatabase;

    /**
     * 站长
     * @test
     */
    public function siteMaster()
    {
        $this->signIn();
        $site = create(Site::class, null, ['user_id' => $this->user->id]);
        $this->assertEquals($this->user->id, $site->master->id);
    }
}
