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

        // Config::create([
        //     'name' => 'system',
        //     'data' => [
        //         'site' => [
        //             'name' => '后盾人',
        //             'tel' => 'abc',
        //             'icp' => '',
        //             'keywords' => '',
        //             'address' => '',
        //             'email' => '',
        //             'author' => ''
        //         ],
        //         'aliyun' => [
        //             'accessKeyId' => '',
        //             'accessKeySecret' => '',
        //             'sms' => [
        //                 'signName' => ""
        //             ]
        //         ]
        //     ]
        // ]);
    }
}
