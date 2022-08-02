<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreModuleRequest;
use App\Http\Requests\UpdateModuleRequest;
use App\Http\Resources\ModuleResource;
use App\Models\Module;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;

//系统模块管理
class ModuleController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum']);
        $this->authorizeResource(Module::class, 'module');
    }

    //模块列表
    public function index()
    {
        $modules = Module::latest()->paginate();
        return ModuleResource::collection($modules);
    }

    //设计模块
    public function store(StoreModuleRequest $request)
    {
        $config =  ['name' => ucfirst($request->name), "version" => "1.0"] + $request->input();
        app('module')->initModuleData($config['name'], $config);

        return $this->success('模块创建成功', data: Module::latest()->first());
    }

    //删除模块
    public function destroy(Module $module)
    {
        app('module')->delete($module);

        return $this->success('模块删除成功');
    }
}
