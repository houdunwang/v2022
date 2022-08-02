<?php

namespace App\Http\Middleware;

use App\Models\Site;
use Closure;
use Illuminate\Http\Request;

class SiteMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $this->getSite();
        $this->config();

        return $next($request);
    }

    //获取站点
    protected function getSite()
    {
        $site = request('site');
        if (is_numeric($site)) $site = Site::findOrFail($site);

        site($site);
    }

    //加载配置
    protected function config()
    {
        if (!site()) return;

        $site = site();
        foreach (config('site') as $name => $value)
            foreach ($value as $key => $item)
                config(["site.{$name}.{$key}" => $site['config'][$name][$key] ?? $item]);
    }
}
