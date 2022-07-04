<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSiteModuleRequest;
use App\Http\Requests\UpdateSiteModuleRequest;
use App\Http\Resources\ModuleResource;
use App\Models\Module;
use App\Models\Site;
use App\Models\SiteModule;

class SiteModuleController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum']);
    }

    public function index(Site $site)
    {
        $modules = $site->modules()->latest()->paginate(request('row', 10));

        return ModuleResource::collection($modules);
    }

    public function store(StoreSiteModuleRequest $request, Site $site)
    {
        $site->modules()->syncWithoutDetaching([$request->module]);
        return $this->success('站点模块设置成功');
    }

    public function destroy(Site $site, Module $module)
    {
        $site->modules()->detach($module);

        return $this->success('站点模块删除成功');
    }

    public function setSiteDefaultModule(Site $site, Module $module)
    {
        $site->module_id = $module->id;
        $site->save();
        // $site->modules()->update(['is_default' => false]);

        // $site->modules()->updateExistingPivot($module->id, ['is_default' => true]);

        return $this->success('默认模块设置成功');
    }
}
