<?php

namespace Tests\Service;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class UploadServiceTest extends TestCase
{
    use RefreshDatabase;
    /**
     * 用户头像上传
     * @test
     */
    public function userAvatarUpload()
    {
        $file = UploadedFile::fake()->image('avatar.png', 100, 100);

        $res = app('upload')->avatar($file);

        $this->assertArrayHasKey('url', $res);
    }
}
