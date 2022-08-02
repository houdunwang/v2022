<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//模块
class Module extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'name', 'version', 'author',  'preview', 'admin', 'front'];

    protected $casts = ['admin' => 'boolean', 'front' => 'boolean'];

    protected $appends = ['permission', 'config'];

    public function getPermissionAttribute()
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
