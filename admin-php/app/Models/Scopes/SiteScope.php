<?php

namespace App\Models\Scopes;

use App\Models\Site;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class SiteScope implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        if ($site = request('site')) {
            $builder->where('site_id', $site instanceof Site ? $site->id : $site);
        }
    }
}
