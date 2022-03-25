<?php

namespace App\Http\Controllers;

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

    public function update(Request $request, string $name)
    {
        $config = Config::firstOrNew();
        $config[$name] = $request->input() + ($config[$name] ?: []);
        $config->save();

        return $config[$name];
    }
}
