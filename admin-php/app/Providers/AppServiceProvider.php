<?php

namespace App\Providers;

use App\Models\Config;
use App\Services\CodeService;
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
        $this->app->instance('code', new CodeService());
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $config = Config::firstOrNew();
        config(['hd' => $config->toArray()]);
    }
}
