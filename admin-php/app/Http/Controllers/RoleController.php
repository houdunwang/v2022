<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Http\Resources\RoleResource;
use App\Models\Permission;
use App\Models\Role;
use App\Models\Site;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum']);
    }

    public function index(Site $site)
    {
        $this->authorize(Role::class);
        $roles = $site->roles()->latest()->paginate(10000);
        return RoleResource::collection($roles);
    }

    public function store(StoreRoleRequest $request, Site $site, Role $role)
    {
        $role->name = $request->name;
        $role->title = $request->title;
        $site->roles()->save($role);

        return $this->success('角色添加成功');
    }

    public function show(Site $site, Role $role)
    {
        return $this->success(data: new RoleResource($role));
    }

    public function update(UpdateRoleRequest $request, Site $site, Role $role)
    {
        $role->fill($request->input())->save();
        return $this->success('角色编辑成功');
    }

    public function destroy(Site $site, Role $role)
    {
        $role->delete();
        return $this->success('删除成功');
    }

    public function permission(Request $request, Site $site, Role $role)
    {
        $ids = Permission::where('site_id', $site->id)->whereIn('name', $request->permissions)->pluck('id');
        $role->syncPermissions($ids);
        return $this->success('权限设置成功');
    }
}
