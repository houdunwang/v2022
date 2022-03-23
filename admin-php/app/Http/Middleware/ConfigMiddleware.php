<?php

namespace App\Http\Middleware;

use App\Models\Config;
use Closure;
use Illuminate\Http\Request;

class ConfigMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $config = Config::firstOrNew()->toArray();

        config(['hd.aliyun' => $config['aliyun'] ?? config('hd.aliyun')]);
        config(['hd.site' => $config['site'] ?? config('hd.site')]);

        return $next($request);
    }
}
