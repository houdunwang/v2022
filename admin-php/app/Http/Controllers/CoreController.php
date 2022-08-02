<?php

namespace App\Http\Controllers;

use App\Http\Resources\SiteResource;
use App\Models\Site;
use Illuminate\Http\Request;

class CoreController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum'])->except(['currentSite']);
    }

    //更新站点数据
    public function update()
    {
        app('module')->syncLocalAllModule();
        app('permission')->syncAllSitePermissions();

        return $this->success('所有站点初始数据更新成功');
    }

    //当前站点
    public function currentSite(Request $request)
    {
        $sid = $request->sid;
        $site = $sid ? Site::find($sid) : Site::where('url', $request->host())->first();
        return $this->success(data: new SiteResource($site));
    }
}
