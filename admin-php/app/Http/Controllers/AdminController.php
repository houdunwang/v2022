<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAdminRequest;
use App\Http\Resources\UserResource;
use App\Models\Admin;
use App\Models\User;
use App\Models\Site;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum']);
        $this->authorizeResource(Admin::class, 'admin');
    }

    public function index(Site $site)
    {
        $admins = $site->admins()->queryCondition()->with(['roles' => function ($query) use ($site) {
            $query->where('site_id', $site->id);
        }])->paginate();

        return UserResource::collection($admins);
    }

    public function show(Site $site, Admin $admin)
    {
        return $this->success(data: new UserResource($admin->user->load('roles')));
    }

    public function store(Site $site, StoreAdminRequest $request)
    {
        $site->admins()->syncWithoutDetaching([$request->user_id]);
        return $this->success();
    }

    public function destroy(Site $site, Admin $admin)
    {
        $site->admins()->detach($admin->user);

        return $this->success('管理员删除成功');
    }

    //设置管理员角色
    public function syncAdminRole(Request $request, Site $site, Admin $admin)
    {
        $admin->user->syncRoles($request->roles);

        return $this->success('角色设置成功');
    }
}
