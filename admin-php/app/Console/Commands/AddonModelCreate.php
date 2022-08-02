<?php

namespace App\Console\Commands;

use Artisan;
use Illuminate\Console\Command;
use Str;

class AddonModelCreate extends Command
{
    protected $signature = 'addon-model {name} {module}';

    protected $description = '同时创建模型、控制器、迁移等。例:addon-model article Blog 说明:article:模型名 Blog模块名';

    public function handle()
    {
        $module = ucfirst($this->argument('module'));
        $name = ucfirst($this->argument('name'));
        $snakeName = Str::snake($this->argument('name'));

        Artisan::call("module:make-model {$name} {$module}");
        Artisan::call("module:make-controller {$name}Controller {$module}");
        Artisan::call("module:make-factory {$name} {$module}");
        Artisan::call("module:make-migration create_{$snakeName}_table {$module}");
        Artisan::call("module:make-seed {$snakeName} {$module}");
        Artisan::call("module:make-policy {$name}Policy {$module}");
        Artisan::call("module:make-resource {$name}Resource {$module}");
        Artisan::call("module:make-request {$name}StoreRequest {$module}");
        Artisan::call("module:make-request {$name}UpdateRequest {$module}");
    }
}
