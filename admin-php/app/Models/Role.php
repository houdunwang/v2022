<?php

namespace App\Models;

use App\Models\Scopes\ScopeTrait;
use App\Models\Scopes\SiteScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role as ModelsRole;

class Role extends ModelsRole
{
    use HasFactory, ScopeTrait;

    protected $fillable = ['name', 'description', 'site_id', 'guard_name'];

    protected $with = ['permissions'];

    protected static function booted()
    {
        static::addGlobalScope(new SiteScope);
    }
}
