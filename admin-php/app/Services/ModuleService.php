<?php

namespace App\Services;

use App\Models\Module as ModelsModule;
use Artisan;
use Nwidart\Modules\Facades\Module;
use Storage;

/**
 * 模块服务
 */
class ModuleService
{
    //同步本地模块到数据表
    public function syncLocalAllModule()
    {
        ModelsModule::whereNotIn('name', array_keys(Module::scan()))->delete();

        collect(Module::scan())->map(function ($module) {
            $config = (include $module->getPath() . "/Config/config.php") + [
                'preview' => url('addons/' . $module->getName() . '/preview.jpeg'),
                'admin' => true
            ];

            ModelsModule::updateOrCreate(
                ['name' => $module->getName()],
                $config
            );
        });

        $this->updateModuleStatusFile();
    }

    //更新modules_statuses.json
    public function updateModuleStatusFile()
    {
        $moduleStatusFile = base_path('modules_statuses.json');
        $json = collect(Module::scan())->map(fn ($module) => true);
        file_put_contents($moduleStatusFile, $json);
    }

    /**
     * 初始模块数据
     * @param [type] $name 模块名
     * @param [type] $config 配置
     */
    public function initModuleData($name, $config)
    {
        $configFile = base_path('addons/' . $name . '/Config/config.php');
        Artisan::call("module:make " . $name);
        file_put_contents($configFile, "<?php return " . var_export($config, true) . ";");

        copy(public_path('static/preview.jpeg'), base_path('addons/' . $name . '/preview.jpeg'));
        copy(base_path('data/module/permissions.php'), base_path('addons/' . $name . '/Config/permissions.php'));
        app('module')->syncLocalAllModule();
    }

    /**
     * 删除模块
     * @param ModelsModule $module
     */
    public function delete(ModelsModule $model)
    {
        if (is_dir(base_path('addons/' . $model->name))) {
            Artisan::call("module:migrate-reset " . $model->name);
            \Module::find($model->name)->delete();
        }

        $this->syncLocalAllModule();
        app('permission')->syncAllSitePermissions();

        return $model->delete();
    }
}
