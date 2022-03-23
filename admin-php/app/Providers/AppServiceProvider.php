<?php

namespace App\Providers;

use App\Models\Config;
use App\Services\CodeService;
use App\Services\SmsService;
use App\Services\UserService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->instance('user', new UserService());
        $this->app->instance('code', new CodeService());
        $this->app->instance("sms", new SmsService);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
    }
}
