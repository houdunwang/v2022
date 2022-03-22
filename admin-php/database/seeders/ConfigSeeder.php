<?php

namespace Database\Seeders;

use App\Models\Config;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Config::create([
            'site' => [
                'name' => '后盾人',
                'tel' => 'abc',
                'icp' => '',
                'keywords' => '',
                'address' => '',
                'email' => '',
                'author' => ''
            ],
            'aliyun' => [
                'accessKeyId' => '',
                'accessKeySecret' => '',
                'sms' => [
                    'signName' => ""
                ]
            ]
        ]);
    }
}
