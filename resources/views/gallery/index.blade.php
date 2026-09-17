@extends('layouts.app')

@section('title', 'Galeri')

@section('content')

<style>
    .gallery-page {
        background: #f8fafc;
        padding: 34px 40px 80px;
        min-height: 600px;
    }

    .gallery-page-inner {
        width: 100%;
        max-width: 1200px;
        margin: 0 auto;
    }

    /* =========================
       BREADCRUMB
    ========================= */

    .gallery-breadcrumb {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 7px;
        margin-top: 12px;
        font-size: 12px;
        color: #777;
    }

    .gallery-breadcrumb a {
        color: #0645c0;
        text-decoration: none;
    }

    .gallery-breadcrumb a:hover {
        text-decoration: underline;
    }

    .gallery-breadcrumb span {
        color: #aaa;
    }


    /* =========================
       JUDUL
    ========================= */

    .gallery-page-heading {
        text-align: center;
        margin-bottom: 34px;
    }

    .gallery-page-heading h1 {
        margin: 0;
        color: #0645c0;
        font-size: 24px;
        line-height: 1.2;
        font-weight: 700;
    }

    .gallery-page-heading p {
        margin: 10px 0 0;
        color: #666;
        font-size: 14px;
        line-height: 1.6;
        font-weight: 400;
    }


    /* =========================
       GRID KATEGORI
    ========================= */

    .gallery-category-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 24px;
    }


    /* =========================
       CARD
    ========================= */

    .gallery-category-card {
        display: block;
        background: #fff;
        border-radius: 10px;
        overflow: hidden;
        text-decoration: none;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.06);
        transition:
            transform 0.2s ease,
            box-shadow 0.2s ease;
    }

    .gallery-category-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.10);
    }


    /* =========================
       FOTO KATEGORI
    ========================= */

    .gallery-category-image {
        width: 100%;
        height: 190px;
        object-fit: cover;
        display: block;
    }


    /* =========================
       ISI CARD
    ========================= */

    .gallery-category-content {
        padding: 16px 17px 17px;
    }

    .gallery-category-name {
        margin: 0;
        color: #0645c0;
        font-size: 16px;
        line-height: 1.4;
        font-weight: 700;
    }

    .gallery-category-link {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        margin-top: 9px;
        color: #0645c0;
        font-size: 13px;
        line-height: 1.4;
        font-weight: 600;
    }


    /* =========================
       PAGINATION
    ========================= */

    .gallery-pagination {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 7px;
        margin-top: 38px;
    }

    .gallery-pagination a,
    .gallery-pagination span {
        min-width: 36px;
        height: 36px;

        display: inline-flex;
        align-items: center;
        justify-content: center;

        padding: 0 11px;

        border-radius: 6px;

        font-size: 13px;
        line-height: 1;

        text-decoration: none;

        box-sizing: border-box;
    }

    .gallery-pagination a {
        color: #0645c0;
        background: #ffffff;
        border: 1px solid #dbe2ea;
    }

    .gallery-pagination a:hover {
        background: #f1f5f9;
        border-color: #0645c0;
    }

    .gallery-pagination .active {
        color: #ffffff;
        background: #0645c0;
        border: 1px solid #0645c0;
        font-weight: 600;
    }

    .gallery-pagination .disabled {
        color: #aaa;
        background: #f8fafc;
        border: 1px solid #e5e7eb;
    }


    /* =========================
       KOSONG
    ========================= */

    .gallery-empty {
        background: #fff;
        border-radius: 10px;
        padding: 40px 20px;
        text-align: center;
        color: #777;
        font-size: 14px;
    }


    /* =========================
       RESPONSIVE
    ========================= */

    @media (max-width: 900px) {

        .gallery-page {
            padding: 30px;
        }

        .gallery-category-grid {
            grid-template-columns: repeat(2, 1fr);
        }

    }


    @media (max-width: 600px) {

        .gallery-page {
            padding: 26px 20px 60px;
        }

        .gallery-category-grid {
            grid-template-columns: 1fr;
            gap: 20px;
        }

        .gallery-category-image {
            height: 180px;
        }

    }
</style>


<section class="gallery-page">

    <div class="gallery-page-inner">


        {{-- =========================
             JUDUL
        ========================= --}}

        <div class="gallery-page-heading">

            <h1>
                Galeri Kegiatan
            </h1>

            <p>
                Dokumentasi Kegiatan dan Momen Berharga di SMKN 4 Bogor
            </p>


            {{-- BREADCRUMB --}}

            <div class="gallery-breadcrumb">

                <a href="{{ route('home') }}">
                    Beranda
                </a>

                <span>/</span>

                <span>
                    Galeri
                </span>

            </div>

        </div>


        {{-- =========================
             KATEGORI
        ========================= --}}

        @if($categories->count())

            <div class="gallery-category-grid">

                @foreach($categories as $category)

                    @php
                        $photo = $category->photos->first();
                    @endphp

                    @if($photo)

                        <a
                            href="{{ route('gallery.category', $category->slug) }}"
                            class="gallery-category-card"
                        >

                            <img
                                src="{{ asset('storage/' . $photo->image) }}"
                                alt="{{ $category->name }}"
                                class="gallery-category-image"
                            >

                            <div class="gallery-category-content">

                                <h2 class="gallery-category-name">
                                    {{ $category->name }}
                                </h2>

                                <span class="gallery-category-link">
                                    Lihat →
                                </span>

                            </div>

                        </a>

                    @endif

                @endforeach

            </div>


            {{-- =========================
                 PAGINATION KATEGORI
            ========================= --}}

            @if($categories->hasPages())

                <div class="gallery-pagination">

                    {{-- SEBELUMNYA --}}

                    @if($categories->onFirstPage())

                        <span class="disabled">
                            ← 
                        </span>

                    @else

                        <a href="{{ $categories->previousPageUrl() }}">
                            ← 
                        </a>

                    @endif


                    {{-- NOMOR HALAMAN --}}

                    @foreach($categories->getUrlRange(1, $categories->lastPage()) as $page => $url)

                        @if($page == $categories->currentPage())

                            <span class="active">
                                {{ $page }}
                            </span>

                        @else

                            <a href="{{ $url }}">
                                {{ $page }}
                            </a>

                        @endif

                    @endforeach


                    {{-- BERIKUTNYA --}}

                    @if($categories->hasMorePages())

                        <a href="{{ $categories->nextPageUrl() }}">
                            →
                        </a>

                    @else

                        <span class="disabled">
                            →
                        </span>

                    @endif

                </div>

            @endif


        @else

            <div class="gallery-empty">
                Belum ada kategori galeri.
            </div>

        @endif

    </div>

</section>

@endsection