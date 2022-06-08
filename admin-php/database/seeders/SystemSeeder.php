<?php

namespace Database\Seeders;

use App\Models\System;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SystemSeeder extends Seeder
{
    public function run()
    {
        System::create(
            ['config' => config('system')]
        );
    }
}
