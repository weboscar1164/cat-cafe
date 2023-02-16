<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\Blog;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function blog()
    {
        return $this->hasmany(Blog::class);
    }
}