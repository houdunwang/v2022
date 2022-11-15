<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class System extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'preview', 'order'];

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }
}
