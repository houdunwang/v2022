<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $hidden = ['path'];

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }
}
