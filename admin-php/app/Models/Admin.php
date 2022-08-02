<?php

namespace App\Models;

use App\Models\Scopes\PaginateConditionScope;
use App\Models\Scopes\ScopeTrait;
use App\Models\Scopes\SiteScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory, ScopeTrait;

    protected static function booted()
    {
        static::addGlobalScope(new SiteScope);
    }

    public function getRouteKeyName()
    {
        return 'user_id';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
