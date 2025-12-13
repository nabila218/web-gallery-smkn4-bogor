<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = [
        'title',
        'category_id',
        'image',
        'description'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
