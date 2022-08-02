<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use App\Models\Site;
use Illuminate\Http\Request;

//站点角色
class RolePermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum']);
    }

    // 设置角色权限
    public function store(Request $request, Site $site, Role $role)
    {
        $ids = Permission::where('site_id', $site->id)->whereIn('name', $request->permissions)->pluck('id');
        $role->syncPermissions($ids);
        return $this->success('权限设置成功', data: $role->refresh()->permissions);
    }
}
