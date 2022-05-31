<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConfigRequest;
use App\Http\Requests\StoreConfigRequest;
use App\Http\Requests\UpdateConfigRequest;
use App\Models\Config;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum']);
    }

    public function update(ConfigRequest $request, string $name)
    {
        $config = Config::where('name', $name)->firstOrNew();
        $config['name'] = $name;
        $config['data'] = $request->input();
        $config->save();

        return $this->success(data: $config);
    }

    public function get(Request $request, string $module)
    {
        return $this->success(data: config($module));
    }
}
