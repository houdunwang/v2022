<?php

namespace Database\Seeders;

use App\Models\Config;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConfigSeeder extends Seeder
{
    public function run()
    {
        // dd(config('system'));
        Config::create(
            ['name' => 'system', 'data' => config('system')]
        );
    }
}
