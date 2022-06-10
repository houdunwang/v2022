<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Http\Resources\UserResource;
use App\Models\Site;
use App\Models\Admin;
use App\Models\User;

class AdminController extends Controller
{
    public function index(Site $site)
    {
        $admins = $site->admins()->when(request('content'), function ($query, $content) {
            $query->where(request('key'), $content);
        })->paginate();
        return UserResource::collection($admins);
    }

    public function store(StoreAdminRequest $request, Site $site)
    {
        $site->admins()->syncWithoutDetaching([$request->user]);
        return $this->success();
    }

    public function update(UpdateAdminRequest $request, Admin $siteAdmin)
    {
    }

    public function destroy(Site $site, User $admin)
    {
        $site->admins()->detach($admin);
        return $this->success('管理员删除成功');
    }
}
