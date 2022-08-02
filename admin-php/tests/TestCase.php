<?php

namespace Tests;

use App\Models\Site;
use App\Models\User;
use Auth;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Foundation\Testing\WithFaker;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, RefreshDatabase, WithFaker;

    protected $user;
    protected $site;
    protected $seed = true;

    protected function setUp(): void
    {
        parent::setUp();
        $this->signIn(User::find(1));
        $this->site = Site::find(1);
    }

    protected function signIn(User $user = null)
    {
        $user = $user ?? create(User::class);
        $this->actingAs($user);

        $this->user = $user;
        return $this;
    }

    protected function logout()
    {
        Auth::logout();
    }
}
