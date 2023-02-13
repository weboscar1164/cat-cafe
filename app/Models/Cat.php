<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Blog;

class Cat extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'breed', 'gender', 'image', 'date_of_birth', 'introduction'];


    public function blogs()
    {
        return $this->belongsToMany(Blog::class)->withTimestamps();
    }
}
