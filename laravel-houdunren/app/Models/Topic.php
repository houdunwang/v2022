<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use GrahamCampbell\Markdown\Facades\Markdown;

class Topic extends Model
{
    use HasFactory;

    protected $fillable =  ['title', 'content'];

    public function getHtmlAttribute()
    {
        return Markdown::convert($this->content)->getContent();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function favorites()
    {
        return $this->morphToMany(User::class, 'favorite')->withTimestamps();
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
