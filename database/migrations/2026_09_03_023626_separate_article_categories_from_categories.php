<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            // Hapus foreign key lama
            $table->dropForeign(['category_id']);

            // Buat foreign key baru ke article_categories
            $table->foreign('category_id')
                ->references('id')
                ->on('article_categories')
                ->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            // Hapus foreign key ke article_categories
            $table->dropForeign(['category_id']);

            // Kembalikan foreign key ke categories
            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->nullOnDelete();
        });
    }
};