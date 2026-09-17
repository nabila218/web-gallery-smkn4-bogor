<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();

            $table->text('address')->nullable();

            $table->string('phone')->nullable();

            $table->string('email')->nullable();

            $table->string('whatsapp')->nullable();

            $table->text('google_maps')->nullable();

            $table->string('operational_days')->nullable();

            $table->string('opening_time')->nullable();

            $table->string('closing_time')->nullable();

            $table->string('twitter')->nullable();

            $table->string('instagram')->nullable();

            $table->string('facebook')->nullable();

            $table->string('youtube')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};