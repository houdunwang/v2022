<?php

namespace App\Services;

use App\Models\Permission;
use App\Models\Site;

//权限管理服务
class PermissionService
{
    protected $permissionNames = [];

    //初始化所有站点权限
    public function syncAllSitePermissions()
    {
        Site::all()->each(function ($site) {
            $this->addModulePermission($site);
            $this->addSystemPermission($site);
            //删除失效的权限
            Permission::where('site_id', $site->id)->whereNotIn('name', $this->permissionNames)->delete();
        });
    }

    //更新站点模块权限
    public function addModulePermission(Site $site)
    {
        $modules = $site->modules->toArray();
        foreach ($modules as &$module)
            foreach ($module['permission'] as &$permission) {
                foreach ($permission['items'] as &$item) {
                    $item['name'] = $module['name'] . '-' . $item['name'];
                    $this->permissionNames[] = $item['name'];
                    //更新权限表
                    $data = ['site_id' => $site->id, 'module_id' => $module['id'], 'guard_name' => 'sanctum'] + $item;
                    Permission::updateOrCreate($data);
                }
            }
        return $modules;
    }

    //更新站点系统权限
    public function addSystemPermission(Site $site)
    {
        $permissions = config('sitePermissions');
        foreach ($permissions as &$permission)
            foreach ($permission['items'] as &$item) {
                $item['name'] = 'system-' . $item['name'];
                $this->permissionNames[] = $item['name'];
                //更新权限表
                $data = ['site_id' => $site->id, 'guard_name' => 'sanctum'] + $item;
                Permission::updateOrCreate($data);
            }

        return ['title' => '系统权限', 'permission' => $permissions];
    }
}
