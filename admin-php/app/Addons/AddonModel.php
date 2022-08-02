<?php

namespace App\Addons;

use App\Models\Scopes\SiteScope;
use App\Models\Site;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

abstract class AddonModel extends Model
{
    use HasFactory;

    protected static function booted()
    {
        static::addGlobalScope(new SiteScope);
    }

    public function site()
    {
        return $this->belongsTo(Site::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
