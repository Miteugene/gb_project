<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['category_id', 'source_id', 'slug', 'title', 'text', 'image', 'author', 'status'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
