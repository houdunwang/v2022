<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'path'];
    protected $hidden = ['path'];

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function learnHistory()
    {
        return $this->belongsToMany(User::class, 'learn_histories')->withTimestamps();
    }
}
