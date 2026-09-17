<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Article;

class ArticleCategory extends Model
{
    protected $fillable = [
        'name',
        'slug',
    ];

    /**
     * Satu kategori artikel dapat memiliki banyak artikel.
     */
    public function articles()
    {
        return $this->hasMany(Article::class, 'category_id');
    }
}