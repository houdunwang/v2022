<?php

namespace App\Models;

use App\Models\Scopes\PaginateConditionScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'name', 'author', 'version', 'preview'];

    protected $appends = ['permissions', 'config'];

    protected static function booted()
    {
        static::addGlobalScope(new PaginateConditionScope);
    }

    public function getPermissionsAttribute()
    {
        $file = base_path("addons/{$this->name}/Config/permissions.php");
        return is_file($file) ? include $file : [];
    }

    public function getConfigAttribute()
    {
        $file = base_path("addons/{$this->name}/Config/config.php");
        return is_file($file) ? include $file : [];
    }
}
