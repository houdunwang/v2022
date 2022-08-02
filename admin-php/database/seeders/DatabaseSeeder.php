<?php

namespace Database\Seeders;

use App\Models\Module;
use App\Models\Site;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            SystemSeeder::class,
            UserSeeder::class,
            SiteSeeder::class,
            RoleSeeder::class,
            PermissionSeeder::class,
        ]);

        //同步本地模块
        app('module')->syncLocalAllModule();
        Site::first()->modules()->attach(Module::all());
        app('permission')->syncAllSitePermissions(Site::first());
    }
}
