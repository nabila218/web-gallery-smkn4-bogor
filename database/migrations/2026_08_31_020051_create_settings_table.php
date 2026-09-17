<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();

            // =============================
            // PROFIL SEKOLAH
            // =============================
            $table->string('school_name')->nullable();
            $table->string('motto')->nullable();
            $table->string('npsn')->nullable();
            $table->string('accreditation')->nullable();
            $table->year('founded_year')->nullable();
            $table->text('short_description')->nullable();

            // =============================
            // BANNER HOME
            // =============================
            $table->string('banner_image')->nullable();
            $table->string('banner_title')->nullable();
            $table->text('banner_description')->nullable();

            // =============================
            // SAMBUTAN
            // =============================
            $table->string('principal_image')->nullable();
            $table->string('principal_name')->nullable();
            $table->string('principal_position')->nullable();
            $table->text('greeting')->nullable();

            // =============================
            // TENTANG SEKOLAH
            // =============================
            $table->string('school_image')->nullable();
            $table->text('about_description')->nullable();
            $table->text('school_history')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};