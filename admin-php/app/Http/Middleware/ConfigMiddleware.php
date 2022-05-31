<?php

namespace App\Http\Middleware;

use App\Models\Config;
use Closure;
use Illuminate\Http\Request;

class ConfigMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $this->loadConfig('system', config('system'));

        return $next($request);
    }

    protected function loadConfig(string $module, $config = [])
    {
        $data = Config::where('name', $module)->firstOrFail()->data;
        // dd($config);
        foreach ($config as $key => $value) {
            $config[$key] = ($data[$key] ?? []) + $value;
        }

        config(['system' => $config]);
    }
}
