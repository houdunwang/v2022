<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Http\Resources\RoleResource;
use App\Models\Role;
use App\Models\Site;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum']);
        $this->authorizeResource(Role::class, 'role');
    }

    public function index(Site $site)
    {
        $roles = Role::queryCondition()->latest()->paginate(100);
        return RoleResource::collection($roles);
    }

    public function store(StoreRoleRequest $request, Site $site, Role $role)
    {
        $this->authorize('create', Role::class);
        $role->fill($request->input() + ['site_id' => $site->id, 'guard_name' => 'sanctum'])->save();

        return $this->success('角色添加成功', data: $role);
    }

    public function show(Site $site, Role $role)
    {
        return $this->success(data: new RoleResource($role));
    }

    public function update(UpdateRoleRequest $request, Site $site, Role $role)
    {
        $this->authorize('update', $role);
        $role->fill($request->input())->save();
        return $this->success('角色更新成功');
    }

    public function destroy(Site $site, Role $role)
    {
        $this->authorize('delete', $role);
        $role->delete();
        return $this->success(message: '删除成功');
    }
}
