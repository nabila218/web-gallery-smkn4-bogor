<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [

        // =============================
        // PROFIL SEKOLAH
        // =============================
        'school_name',
        'motto',
        'npsn',
        'accreditation',
        'founded_year',
        'short_description',
        'student_count',
        'teacher_count',

        // =============================
        // BANNER HOME
        // =============================
        'banner_image',
        'banner_title',
        'banner_description',

        // =============================
        // SAMBUTAN KEPALA SEKOLAH
        // =============================
        'principal_image',
        'principal_name',
        'principal_position',
        'greeting',

        // =============================
        // TENTANG SEKOLAH
        // =============================
        'school_image',
        'about_description',
        'school_history',
    ];
}