<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'preview', 'description'];

    public function videos()
    {
        return $this->hasMany(Video::class);
    }

    public function system()
    {
        return $this->belongsTo(System::class);
    }
}
