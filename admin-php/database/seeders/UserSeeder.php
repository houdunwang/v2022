<?php

namespace Database\Seeders;

use App\Models\Site;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::factory(20)->create();
        User::factory(3)->has(Site::factory())->create();

        $user  = User::first();
        $user->name = '向军大叔';
        $user->email = '2300071698@qq.com';
        $user->mobile = '18888888888';
        $user->save();
    }
}
