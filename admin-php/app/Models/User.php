<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $guard_name = ['sanctum'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'openid',
        'unionid',
        'miniapp_openid',
        'mobile',
        'avatar'
    ];

    // protected $appends = ['avatar_url'];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // public function getAvatarUrlAttribute()
    // {
    //     return $this->avatar ?? url('static/avatar.png');
    // }

    /**
     * 关注列表
     * @return BelongsToMany
     */
    public function followers()
    {
        return $this->belongsToMany(User::class, 'followers', 'user_id', 'follower_id');
    }

    /**
     * 是否关注用户
     * @param User $user
     * @return bool
     */
    public function isFollower(User $user)
    {
        return $this->followers()->where('follower_id', $user->id)->exists();
    }


    /**
     * 粉丝列表
     * @return BelongsToMany
     */
    public function fans()
    {
        return $this->belongsToMany(User::class, 'followers', 'follower_id', 'user_id');
    }
}
