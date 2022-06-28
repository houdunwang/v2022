<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePermissionRequest;
use App\Http\Requests\UpdatePermissionRequest;
use App\Http\Resources\PermissionResource;
use App\Models\Permission;
use App\Models\Site;

class PermissionController extends Controller
{
    public function __construct()
    {
        // $this->middleware(['auth:sanctum']);
    }

    public function getSitePermissionTable(Site $site)
    {
        $permissions = [
            app('permission')->getSiteSystemPermissions($site),
            ...app('permission')->getSiteModulePermissions($site)
        ];
        return $this->success(data: $permissions);
    }
    // public function index()
    // {
    //     $permissions = Permission::all();
    //     return $this->success(data: PermissionResource::collection($permissions));
    // }

    // public function store(StorePermissionRequest $request)
    // {
    //     $permission = Permission::create(['name' => $request->name, 'title' => $request->title]);
    //     return $this->success(data: new PermissionResource($permission));
    // }

    // public function show(Permission $permission)
    // {
    //     return $this->success(data: new PermissionResource($permission));
    // }

    // public function update(UpdatePermissionRequest $request, Permission $permission)
    // {
    //     $permission->name = $request->name;
    //     $permission->title = $request->title;
    //     $permission->save();
    //     return $this->success(data: new PermissionResource($permission));
    // }

    // public function destroy(Permission $permission)
    // {
    //     $permission->delete();
    //     return $this->success('权限删除成功');
    // }
}
