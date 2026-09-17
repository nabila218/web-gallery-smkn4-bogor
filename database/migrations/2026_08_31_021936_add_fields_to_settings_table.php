<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('settings', function (Blueprint $table) {

            // =========================
            // PROFIL SEKOLAH
            // =========================

            if (!Schema::hasColumn('settings', 'school_name')) {
                $table->string('school_name')->nullable();
            }

            if (!Schema::hasColumn('settings', 'npsn')) {
                $table->string('npsn')->nullable();
            }

            if (!Schema::hasColumn('settings', 'accreditation')) {
                $table->string('accreditation')->nullable();
            }

            if (!Schema::hasColumn('settings', 'founded_year')) {
                $table->year('founded_year')->nullable();
            }

            if (!Schema::hasColumn('settings', 'motto')) {
                $table->text('motto')->nullable();
            }

            if (!Schema::hasColumn('settings', 'school_description')) {
                $table->text('school_description')->nullable();
            }

            if (!Schema::hasColumn('settings', 'school_photo')) {
                $table->string('school_photo')->nullable();
            }


            // =========================
            // BANNER HOME
            // =========================

            if (!Schema::hasColumn('settings', 'banner_image')) {
                $table->string('banner_image')->nullable();
            }

            if (!Schema::hasColumn('settings', 'banner_title')) {
                $table->string('banner_title')->nullable();
            }

            if (!Schema::hasColumn('settings', 'banner_description')) {
                $table->text('banner_description')->nullable();
            }


            // =========================
            // SAMBUTAN
            // =========================

            if (!Schema::hasColumn('settings', 'principal_photo')) {
                $table->string('principal_photo')->nullable();
            }

            if (!Schema::hasColumn('settings', 'principal_name')) {
                $table->string('principal_name')->nullable();
            }

            if (!Schema::hasColumn('settings', 'principal_position')) {
                $table->string('principal_position')->nullable();
            }

            if (!Schema::hasColumn('settings', 'greeting')) {
                $table->text('greeting')->nullable();
            }


            // =========================
            // TENTANG SEKOLAH
            // =========================

            if (!Schema::hasColumn('settings', 'about_photo')) {
                $table->string('about_photo')->nullable();
            }

            if (!Schema::hasColumn('settings', 'about_description')) {
                $table->text('about_description')->nullable();
            }

            if (!Schema::hasColumn('settings', 'school_history')) {
                $table->text('school_history')->nullable();
            }
        });
    }


    public function down(): void
    {
        Schema::table('settings', function (Blueprint $table) {

            $columns = [
                'school_name',
                'npsn',
                'accreditation',
                'founded_year',
                'motto',
                'school_description',
                'school_photo',

                'banner_image',
                'banner_title',
                'banner_description',

                'principal_photo',
                'principal_name',
                'principal_position',
                'greeting',

                'about_photo',
                'about_description',
                'school_history',
            ];

            foreach ($columns as $column) {

                if (Schema::hasColumn('settings', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
};