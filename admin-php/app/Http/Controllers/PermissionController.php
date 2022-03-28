<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePermissionRequest;
use App\Http\Requests\UpdatePermissionRequest;
use App\Http\Resources\PermissionResource;
use App\Models\Permission;

class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum']);
    }

    public function index()
    {
        $permissions = Permission::all();
        return PermissionResource::collection($permissions);
    }

    public function store(StorePermissionRequest $request)
    {
        $permission = Permission::create(['name' => $request->name, 'title' => $request->title]);
        return new PermissionResource($permission);
    }

    public function show(Permission $permission)
    {
        return new PermissionResource($permission);
    }

    public function update(UpdatePermissionRequest $request, Permission $permission)
    {
        $permission->name = $request->name;
        $permission->title = $request->title;
        $permission->save();
        return new PermissionResource($permission);
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();
        return response(['message' => '权限删除成功']);
    }
}
