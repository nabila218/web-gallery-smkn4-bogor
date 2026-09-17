<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contacts';

    protected $fillable = [
        'address',
        'phone',
        'whatsapp',
        'email',
        'google_maps',

        'operational_days',
        'opening_time',
        'closing_time',

        'twitter',
        'instagram',
        'facebook',
        'youtube',
    ];
}