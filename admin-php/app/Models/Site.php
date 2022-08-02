<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;

/**
 * 站点
 * @package App\Models
 */
class Site extends Model
{
    use HasFactory;

    protected $fillable = ['config', 'title', 'url', 'module_id', 'tel', 'email', 'address', 'wechat', 'qq', 'icp', 'copyright', 'logo', 'description', 'keywords'];

    protected $casts = [
        'config' => 'array',
    ];

    protected $hidden = ['config'];

    protected $withs = ['module'];

    //站长
    public function master()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function roles()
    {
        return $this->hasMany(Role::class, 'site_id');
    }

    public function admins()
    {
        return $this->belongsToMany(User::class, 'admins')->withTimestamps();
    }

    public function config()
    {
        return $this->hasOne(SiteConfig::class, 'site_id');
    }

    public function modules()
    {
        return $this->belongsToMany(Module::class, 'site_modules')->withTimestamps();
    }

    //默认模块
    public function module()
    {
        return $this->belongsTo(Module::class);
    }

    public function permissions()
    {
        return $this->hasMany(Permission::class);
    }
}
