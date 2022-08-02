<?php

namespace App\Http\Controllers;

use App\Models\Site;

//站点权限
class SitePermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum']);
    }

    //获取站点所有权限信息，包括模块与系统权限
    public function index(Site $site)
    {
        return $this->success(
            data: [app('permission')->addSystemPermission($site), ...app('permission')->addModulePermission($site)]
        );
    }
}
