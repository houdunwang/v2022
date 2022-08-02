<?php

namespace Tests\Feature\Upload;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class UploadAvatarTest extends TestCase
{
    /**
     * 上传文件不能为空
     * @test
     */
    public function uploadFilesCantBeEmpty()
    {
        $response = $this->postJson('/api/upload/avatar', []);

        $response->assertStatus(422)->assertJsonValidationErrors('file');
    }

    /**
     * 头像必须为图片类型
     * @test
     */
    public function imageMustBeTypeForThePicture()
    {
        $response = $this->postJson('/api/upload/avatar', [
            'file' => UploadedFile::fake()->create('a.txt', 500)
        ]);

        $response->assertStatus(422)->assertJsonValidationErrors('file');
    }

    /**
     * 图片大小限制
     * @test
     */
    public function imageSizeLimit()
    {
        $response = $this->postJson('/api/upload/avatar', [
            'file' => UploadedFile::fake()->image('a.jpeg', 20, 20)
        ]);

        $response->assertStatus(422)->assertJsonValidationErrors('file');
    }

    /**
     * 成功上传头像
     * @test
     */
    public function uploadImageSuccessfully()
    {
        $response = $this->postJson('/api/upload/avatar', [
            'file' => UploadedFile::fake()->image('a.jpeg', 600, 600)
        ]);

        $response->assertStatus(200)->assertJson([
            'status' => 'success',
            'data' => ['url' => true]
        ]);
    }
}
