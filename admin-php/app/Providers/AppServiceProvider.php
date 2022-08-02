<?php

namespace App\Providers;

use App\Models\Config;
use App\Services\AlipayService;
use App\Services\CodeService;
use App\Services\ModuleService;
use App\Services\PermissionService;
use App\Services\SmsService;
use App\Services\UploadService;
use App\Services\UserService;
use Illuminate\Http\Resources\Json\JsonResource;
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
        $this->app->instance('user', new UserService);
        $this->app->instance('module', new ModuleService);
        $this->app->instance('code', new CodeService);
        $this->app->instance("sms", new SmsService);
        $this->app->instance("upload", new UploadService);
        $this->app->instance("permission", new PermissionService);
        $this->app->instance("alipay", new AlipayService);

        if ($this->app->environment('local')) {
            $this->app->register(\Laravel\Telescope\TelescopeServiceProvider::class);
            $this->app->register(TelescopeServiceProvider::class);
        }

        if ($this->app->isLocal()) {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $configFile = base_path('config.php');

        if (is_file($configFile)) {
            $config = include $configFile;
            config(['app' => $config['app'] + config('app')]);
            config(['database.connections.mysql' => $config['database'] + config('database.connections.mysql')]);
        }

        JsonResource::withoutWrapping();
    }
}
