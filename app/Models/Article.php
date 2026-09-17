<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\ArticleCategory;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'image',
        'category_id',
        'status',
    ];

    public function category()
    {
        return $this->belongsTo(ArticleCategory::class, 'category_id');
    }
}