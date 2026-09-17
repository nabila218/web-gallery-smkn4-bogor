@extends('layouts.app')

@section('title', $category->name)

@section('content')

<style>
    .gallery-category-page {
        background: #f8fafc;
        padding: 34px 40px 90px;
        min-height: 650px;
    }

    .gallery-category-page-inner {
        width: 100%;
        max-width: 1200px;
        margin: 0 auto;
    }

    /* BREADCRUMB */
    .gallery-category-breadcrumb {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 7px;
        margin-bottom: 28px;
        font-size: 12px;
        color: #777;
    }

    .gallery-category-breadcrumb a {
        color: #0645c0;
        text-decoration: none;
    }

    .gallery-category-breadcrumb a:hover {
        text-decoration: underline;
    }

    .gallery-category-breadcrumb span {
        color: #aaa;
    }

    /* JUDUL */
    .gallery-category-heading {
        text-align: center;
        margin-bottom: 34px;
    }

    .gallery-category-heading h1 {
        margin: 0;
        color: #0645c0;
        font-size: 24px;
        line-height: 1.2;
        font-weight: 700;
    }

    /* GRID FOTO */
    .gallery-photo-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 28px 22px;
    }

    /* FOTO */
    .gallery-photo-card {
        background: #fff;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 2px 9px rgba(0, 0, 0, 0.06);
    }

    .gallery-photo-card img {
        width: 100%;
        height: 260px;
        object-fit: cover;
        object-position: center center;
        display: block;
    }

    .gallery-photo-title {
        margin: 0;
        padding: 13px 14px 15px;
        color: #333;
        font-size: 14px;
        line-height: 1.5;
        font-weight: 600;
        text-align: center;
    }

    /* KALAU KOSONG */
    .gallery-photo-empty {
        background: #fff;
        border-radius: 8px;
        padding: 45px 20px;
        text-align: center;
        color: #777;
        font-size: 14px;
    }

    /* RESPONSIVE */
    @media (max-width: 900px) {

        .gallery-category-page {
            padding: 30px;
        }

        .gallery-photo-grid {
            grid-template-columns: repeat(2, 1fr);
        }

    }

    @media (max-width: 600px) {

        .gallery-category-page {
            padding: 26px 20px 70px;
        }

        .gallery-photo-grid {
            grid-template-columns: 1fr;
            gap: 20px;
        }

        .gallery-photo-card img {
            height: 200px;
        }

    }
</style>


<section class="gallery-category-page">

    <div class="gallery-category-page-inner">


        {{-- =========================
             JUDUL
        ========================= --}}

        <div class="gallery-category-heading">

            <h1>
                {{ $category->name }}
            </h1>

        </div>


        {{-- =========================
             BREADCRUMB
        ========================= --}}

        <div class="gallery-category-breadcrumb">

            <a href="{{ route('home') }}">
                Beranda
            </a>

            <span>/</span>

            <a href="{{ route('gallery.index') }}">
                Galeri
            </a>

            <span>/</span>

            <span>
                {{ $category->name }}
            </span>

        </div>


        {{-- =========================
             FOTO
        ========================= --}}

        @if($category->photos->count())

            <div class="gallery-photo-grid">

                @foreach($category->photos as $photo)

                    <div class="gallery-photo-card">

                        <img
                            src="{{ asset('storage/' . $photo->image) }}"
                            alt="{{ $photo->title ?? $category->name }}"
                        >

                        @if($photo->title)

                            <p class="gallery-photo-title">
                                {{ $photo->title }}
                            </p>

                        @endif

                    </div>

                @endforeach

            </div>

        @else

            <div class="gallery-photo-empty">
                Belum ada foto pada kategori ini.
            </div>

        @endif


    </div>

</section>

@endsection