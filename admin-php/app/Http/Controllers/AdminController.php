<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Http\Resources\UserResource;
use App\Models\Site;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Site $site)
    {
        $admins = $site->admins()->with(['roles' => function ($query) use ($site) {
            $query->where('site_id', $site->id);
        }])->paginate();
        return UserResource::collection($admins);
    }

    public function store(StoreAdminRequest $request, Site $site)
    {
        $site->admins()->syncWithoutDetaching([$request->user]);
        return $this->success();
    }

    public function show(Request $request, Site $site, User $admin)
    {
        return $this->success(data: $admin->load('roles'));
    }

    public function update(UpdateAdminRequest $request, Admin $siteAdmin)
    {
    }

    public function destroy(Site $site, User $admin)
    {
        $site->admins()->detach($admin);
        return $this->success('管理员删除成功');
    }

    public function setRole(Request $request, Site $site, User $admin)
    {
        $admin->syncRoles($request->roles);
        return $this->success('角色设置成功');
    }
}
