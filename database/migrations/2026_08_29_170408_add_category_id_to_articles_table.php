<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // category_id sudah ada di tabel articles,
        // jadi migration ini tidak menambahkan kolom lagi.

        if (!Schema::hasColumn('articles', 'category_id')) {
            Schema::table('articles', function (Blueprint $table) {
                $table->foreignId('category_id')
                    ->nullable()
                    ->after('image');
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('articles', 'category_id')) {
            Schema::table('articles', function (Blueprint $table) {
                $table->dropColumn('category_id');
            });
        }
    }
};