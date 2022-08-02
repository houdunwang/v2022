<?php

namespace App\Console\Commands;

use Artisan;
use Illuminate\Console\Command;
use Str;

class AddonModuleReset extends Command
{
    protected $signature = 'addon-migrate:reset {module} {--seed}';

    protected $description = '模块迁移重置与数据填充。例:addon-migrate:reset Blog --seed 说明:--seed为可选项';

    public function handle()
    {
        $module = ucfirst($this->argument('module'));
        $seed = $this->option('seed');

        Artisan::call("module:migrate-refresh {$module}");
        Artisan::call("module:migrate {$module}");
        Artisan::call("module:seed {$module}");
    }
}
