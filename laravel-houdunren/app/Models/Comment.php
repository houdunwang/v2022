<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use GrahamCampbell\Markdown\Facades\Markdown;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['content', 'user_id', 'comment_id', 'reply_user_id'];

    protected $with = ['user', 'replyUser', 'comment'];

    protected $appends = ['html'];

    public function getHtmlAttribute()
    {
        return Markdown::convert($this->content)->getContent();
    }

    public function model()
    {
        return $this->morphTo('commentable');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function replyUser()
    {
        return $this->belongsTo(User::class, 'reply_user_id');
    }

    public function comment()
    {
        return $this->belongsTo(Comment::class, 'comment_id');
    }

    public function replys()
    {
        return $this->hasMany(Comment::class, 'comment_id');
    }
}
