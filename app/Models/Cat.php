<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Blog;

class Cat extends Model
{
    use HasFactory;

    public function blogs()
    {
        return $this->belongsToMany(Blog::class)->withTimestamps();
    }
}