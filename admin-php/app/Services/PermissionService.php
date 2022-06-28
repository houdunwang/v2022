<?php

namespace App\Services;

use App\Models\Site;
use App\Models\Permission;

class PermissionService
{
    protected $site;
    protected $permissions = [];

    public function syncSitePermissions(Site $site)
    {
        $this->getSiteModulePermissions($site);
        $this->getSiteSystemPermissions($site);

        collect($this->permissions)->each(function ($data) {
            Permission::updateOrCreate($data);
        });

        //删除不存在权限
        $names = collect($this->permissions)->map(fn ($item) => $item['name']);
        $site->permissions()->whereNotIn('name', $names->toArray())->delete();
    }

    //获取站点的模块权限
    public function getSiteModulePermissions(Site $site)
    {
        $modules = $site->modules->toArray();
        foreach ($modules as &$module)
            foreach ($module['permissions'] as &$permission)
                foreach ($permission['items'] as &$item) {
                    $item['name'] = $module['name'] . '-' . $item['name'];
                    $this->permissions[] = [
                        'name' => $item['name'],
                        'title' => $item['title'],
                        'site_id' => $site->id,
                        'module_id' => $module['id'],
                        'guard_name' => 'sanctum'
                    ];
                }

        return $modules;
    }

    //获取站点的模块权限
    public function getSiteSystemPermissions(Site $site)
    {
        $permissions = config('sitePermission');
        foreach ($permissions as &$permission)
            foreach ($permission['items'] as &$item) {
                $item['name'] = 'system-' . $item['name'];
                $this->permissions[] = [
                    'name' => $item['name'],
                    'title' => $item['title'],
                    'site_id' => $site->id,
                    'guard_name' => 'sanctum'
                ];
            }

        return ['title' => '系统权限', 'permissions' => $permissions];
    }
}
