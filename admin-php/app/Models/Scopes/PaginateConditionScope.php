<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class PaginateConditionScope implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        return $builder->when(request('key'), function ($query, $key) {
            $query->where($key, 'like', "%" . request('content') . "%");
        });
    }
}
