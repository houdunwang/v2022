<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreModuleRequest;
use App\Http\Requests\UpdateModuleRequest;
use App\Http\Resources\ModuleResource;
use App\Models\Module;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;

class ModuleController extends Controller
{
    public function index()
    {
        $modules = Module::latest()->paginate();

        return ModuleResource::collection($modules);
    }

    public function store(StoreModuleRequest $request)
    {
        $config = $request->input();
        $config['name'] = ucfirst($config['name']);
        Artisan::call("module:make " . ucfirst($request->name));

        file_put_contents(
            base_path('addons/' . $config['name'] . '/Config/config.php'),
            "<?php return " . var_export($config, true) . ';'
        );

        copy(public_path('static/preview.jpeg'), base_path('addons/' . $config['name'] . '/preview.jpeg'));


        return $this->success();
    }


    public function show(Module $module)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function edit(Module $module)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateModuleRequest  $request
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateModuleRequest $request, Module $module)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function destroy(Module $module)
    {
        Artisan::call('module:migrate-reset ' . $module->name);

        Storage::disk('addons')->deleteDirectory($module->name);

        $module->delete();
        return $this->success('模块删除成功');
    }

    // public function syncLocalModule()
    // {
    //     app('module')->syncModule();
    //     return $this->success('模型同步成功');
    // }
}
