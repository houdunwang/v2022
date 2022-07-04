<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'url', 'config'];

    protected $casts = ['config' => 'array'];

    protected $with = ['user', 'module'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function admins()
    {
        return $this->belongsToMany(User::class, 'admins')->withTimestamps();
    }

    public function modules()
    {
        return $this->belongsToMany(Module::class, 'site_modules')->withTimestamps();
    }

    public function module()
    {
        return $this->belongsTo(Module::class);
    }

    public function permissions()
    {
        return $this->hasMany(Permission::class);
    }

    public function roles()
    {
        return $this->hasMany(Role::class);
    }
}
