<?php

namespace App\Services;

use App\Models\Module as ModelsModule;
use Nwidart\Modules\Facades\Module;

class ModuleService
{
    public function syncModule()
    {
        Module::collections()->map(function ($module) {
            $config = include $module->getPath() . "/Config/config.php";
            ModelsModule::updateOrCreate(
                ['name' => $config['name']],
                $config + ['preview' => url('addons/' . $module->getName() . '/preview.jpeg')]
            );
        });
    }
}
