<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Http\Resources\RoleResource;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum']);
    }

    public function index()
    {
        return $this->success(data: RoleResource::collection(Role::all()));
    }

    public function store(StoreRoleRequest $request, Role $role)
    {
        $role->name = $request->name;
        $role->title = $request->title;
        $role->save();
        return $this->success(data: new RoleResource($role));
    }

    public function show(Role $role)
    {
        return $this->success(data: new RoleResource($role));
    }


    public function update(UpdateRoleRequest $request, Role $role)
    {
        $role->fill($request->input())->save();
        return $this->success(data: new RoleResource($role));
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return $this->success('删除成功');
    }

    public function permission(Role $role, Request $request)
    {
        $permissions = $request->permissions;
        $role->syncPermissions($permissions);
        return $this->success('操作成功');
    }
}
