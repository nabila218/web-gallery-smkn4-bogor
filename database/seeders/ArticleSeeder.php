<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\ArticleCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        $berita = ArticleCategory::where('name', 'Berita')->first();
        $kegiatan = ArticleCategory::where('name', 'Kegiatan')->first();
        $prestasi = ArticleCategory::where('name', 'Prestasi')->first();
        $pengumuman = ArticleCategory::where('name', 'Pengumuman')->first();

        $articles = [
            [
                'title' => 'Upacara Kelulusan MPLS Pancawaluya',
                'content' => 'Upacara Kelulusan MPLS Pancawaluya SMKN 4 Bogor.',
                'category_id' => $berita?->id,
                'status' => 'Publish',
            ],

            [
                'title' => 'Demos Ekstrakurikuler SMKN 4 Bogor !!',
                'content' => 'Demos Ekstrakurikuler SMKN 4 Bogor.',
                'category_id' => $kegiatan?->id,
                'status' => 'Publish',
            ],

            [
                'title' => 'Prestasi LKS Tingkat Kota Bogor',
                'content' => 'Prestasi LKS Tingkat Kota Bogor.',
                'category_id' => $prestasi?->id,
                'status' => 'Publish',
            ],

            [
                'title' => 'Pengumuman SPMB SMKN 4 Bogor',
                'content' => 'Pengumuman SPMB SMKN 4 Bogor.',
                'category_id' => $pengumuman?->id,
                'status' => 'Publish',
            ],

            [
                'title' => 'Pelepasan Siswa PKL Tahun Ajaran 2025',
                'content' => 'Pelepasan Siswa PKL Tahun Ajaran 2025.',
                'category_id' => $berita?->id,
                'status' => 'Publish',
            ],
        ];

        foreach ($articles as $article) {
            Article::firstOrCreate(
                ['slug' => Str::slug($article['title'])],
                $article + [
                    'slug' => Str::slug($article['title']),
                ]
            );
        }
    }
}