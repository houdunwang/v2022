<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class System extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'logo', 'tel', 'email', 'address', 'wechat', 'qq', 'icp', 'logo', 'copyright',];

    protected $casts = ['config' => 'array'];

    protected $hidden = ['config'];
}
