<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Photo;

class Category extends Model
{
    protected $fillable = [
        'name',
        'slug',
    ];

    /**
     * Satu kategori dapat memiliki banyak foto galeri.
     */
    public function photos()
    {
        return $this->hasMany(Photo::class);
    }
}