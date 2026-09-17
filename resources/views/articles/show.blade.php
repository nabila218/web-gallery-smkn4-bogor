@extends('layouts.app')

@section('title', $article->title)

@section('content')

<style>
    /* =========================
       ARTICLE DETAIL PAGE
    ========================= */

    .article-detail-page {
        width: 100%;
        background: #f8fafc;
        padding: 30px 40px 65px;
    }

    .article-detail-container {
        width: 100%;
        max-width: 1200px;
        margin: 0 auto;
    }


    /* =========================
       PAGE TITLE
    ========================= */

    .article-detail-header {
        text-align: center;
        margin-bottom: 30px;
    }

    .article-detail-page-title {
        margin: 0;
        color: #16418f;
        font-size: 24px;
        line-height: 1.3;
        font-weight: 700;
    }


    /* =========================
       BREADCRUMB
    ========================= */

    .article-detail-breadcrumb {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        justify-content: center;
        gap: 7px;

        margin-top: 8px;

        font-size: 12px;
        line-height: 1.4;
        font-weight: 400;
    }

    .article-detail-breadcrumb a {
        color: #16418f;
        text-decoration: none;
    }

    .article-detail-breadcrumb a:hover {
        text-decoration: underline;
    }

    .article-detail-breadcrumb .separator {
        color: #999;
    }

    .article-detail-breadcrumb .current {
        color: #777;
    }


    /* =========================
       LAYOUT
    ========================= */

    .article-detail-layout {
        display: grid;
        grid-template-columns: minmax(0, 1fr) 260px;
        gap: 28px;
        align-items: start;
    }


    /* =========================
       ARTICLE
    ========================= */

    .article-detail-main {
        min-width: 0;
    }

    .article-detail-title {
        margin: 0 0 8px;

        color: #16418f;
        font-size: 28px;
        line-height: 1.3;
        font-weight: 700;
    }

    .article-detail-meta {
        display: flex;
        align-items: center;
        gap: 10px;

        margin-bottom: 16px;

        color: #777;
        font-size: 13px;
        line-height: 1.4;
        font-weight: 400;
    }

    .article-detail-meta .dot {
        color: #aaa;
    }

    .article-detail-image {
        width: 100%;
        max-height: 430px;

        display: block;

        object-fit: cover;
        border-radius: 7px;

        margin-bottom: 8px;
    }

    .article-detail-caption {
        margin: 0 0 22px;

        color: #999;
        text-align: center;

        font-size: 11px;
        line-height: 1.4;
        font-weight: 400;
    }

    .article-detail-text {
        color: #222;
        font-size: 15px;
        line-height: 1.7;
        font-weight: 400;
    }

    .article-detail-text p {
        margin: 0 0 18px;
    }


    /* =========================
       SIDEBAR
    ========================= */

    .article-detail-sidebar {
        min-width: 0;
    }

    .article-sidebar-box {
        background: #fff;
        border: 1px solid #dbe2ea;
        border-radius: 7px;
        overflow: hidden;

        margin-bottom: 28px;
    }

    .article-sidebar-title {
        margin: 0;

        padding: 14px 16px;

        background: #16418f;
        color: #fff;

        font-size: 17px;
        line-height: 1.4;
        font-weight: 700;
    }


    /* =========================
       KATEGORI
    ========================= */

    .article-category-list {
        padding: 7px 0;
    }

    .article-category-list a {
        display: block;

        padding: 9px 16px;

        color: #222;
        font-size: 14px;
        line-height: 1.4;
        font-weight: 400;

        text-decoration: none;

        transition: .2s ease;
    }

    .article-category-list a:hover {
        color: #16418f;
        background: #f1f5f9;
    }

    .article-category-list a.active {
        color: #155eef;
        font-weight: 600;
    }


    /* =========================
       BERITA TERBARU
    ========================= */

    .latest-articles {
        padding: 14px;
    }

    .latest-article {
        display: flex;
        gap: 12px;

        padding-bottom: 14px;
        margin-bottom: 14px;

        border-bottom: 1px solid #e5e7eb;
    }

    .latest-article:last-child {
        padding-bottom: 0;
        margin-bottom: 0;
        border-bottom: none;
    }

    .latest-article-image {
        width: 92px;
        height: 70px;

        flex-shrink: 0;

        overflow: hidden;
        border-radius: 6px;

        background: #dbeafe;
    }

    .latest-article-image img {
        width: 100%;
        height: 100%;

        display: block;

        object-fit: cover;
    }

    .latest-article-info {
        min-width: 0;
    }

    .latest-article-info a {
        display: block;

        margin-bottom: 6px;

        color: #222;
        font-size: 13px;
        line-height: 1.35;
        font-weight: 600;

        text-decoration: none;
    }

    .latest-article-info a:hover {
        color: #16418f;
    }

    .latest-article-date {
        color: #999;
        font-size: 11px;
        line-height: 1.4;
        font-weight: 400;
    }


    /* =========================
       RESPONSIVE
    ========================= */

    @media (max-width: 900px) {

        .article-detail-layout {
            grid-template-columns: 1fr;
        }

    }


    @media (max-width: 600px) {

        .article-detail-page {
            padding: 25px 18px 50px;
        }

        .article-detail-page-title {
            font-size: 21px;
        }

        .article-detail-title {
            font-size: 24px;
        }

        .article-detail-text {
            font-size: 14px;
            line-height: 1.7;
        }

        .article-detail-image {
            max-height: 300px;
        }

    }
</style>


<section class="article-detail-page">

    <div class="article-detail-container">


        {{-- =========================
             HEADER
        ========================= --}}

        <div class="article-detail-header">

            <h1 class="article-detail-page-title">
                Artikel Terbaru
            </h1>

            <div class="article-detail-breadcrumb">

                <a href="{{ route('home') }}">
                    Beranda
                </a>

                <span class="separator">
                    /
                </span>

                <a href="{{ route('articles.index') }}">
                    Artikel
                </a>

                <span class="separator">
                    /
                </span>

                <span class="current">
                    {{ $article->title }}
                </span>

            </div>

        </div>


        {{-- =========================
             ARTIKEL + SIDEBAR
        ========================= --}}

        <div class="article-detail-layout">


            {{-- =========================
                 ARTIKEL UTAMA
            ========================= --}}

            <main class="article-detail-main">

                <h2 class="article-detail-title">
                    {{ $article->title }}
                </h2>


                <div class="article-detail-meta">

                    <span>
                        SMKN 4 Bogor
                    </span>

                    <span class="dot">
                        •
                    </span>

                    <span>
                        {{ $article->created_at->translatedFormat('d F Y') }}
                    </span>

                </div>


                {{-- GAMBAR --}}

                @if ($article->image)

                    <img
                        src="{{ asset('storage/' . $article->image) }}"
                        alt="{{ $article->title }}"
                        class="article-detail-image"
                    >

                @else

                    <img
                        src="{{ asset('storage/article/kegiatan-sekolah.PNG') }}"
                        alt="{{ $article->title }}"
                        class="article-detail-image"
                    >

                @endif


                <p class="article-detail-caption">
                    Dokumentasi {{ $article->title }} SMKN 4 Bogor.
                </p>


                {{-- ISI ARTIKEL --}}

                <div class="article-detail-text">

                    {!! nl2br(e($article->content)) !!}

                </div>

            </main>


            {{-- =========================
                 SIDEBAR
            ========================= --}}

            <aside class="article-detail-sidebar">


                {{-- KATEGORI --}}

                <div class="article-sidebar-box">

                    <h2 class="article-sidebar-title">
                        Kategori Berita
                    </h2>

                    <div class="article-category-list">

                        <a
                            href="{{ route('articles.index') }}"
                        >
                            Semua Berita
                        </a>

                        @foreach ($categories as $category)

                            <a
                                href="{{ route('articles.index', ['category' => $category->slug]) }}"
                                class="{{ $article->category && $article->category->slug === $category->slug ? 'active' : '' }}"
                            >
                                {{ $category->name }}
                            </a>

                        @endforeach

                    </div>

                </div>


                {{-- BERITA TERBARU --}}

                <div class="article-sidebar-box">

                    <h2 class="article-sidebar-title">
                        Berita Terbaru
                    </h2>

                    <div class="latest-articles">

                        @foreach ($latestArticles as $latest)

                            <div class="latest-article">

                                <div class="latest-article-image">

                                    @if ($latest->image)

                                        <img
                                            src="{{ asset('storage/' . $latest->image) }}"
                                            alt="{{ $latest->title }}"
                                        >

                                    @else

                                        <img
                                            src="{{ asset('storage/article/kegiatan-sekolah.PNG') }}"
                                            alt="{{ $latest->title }}"
                                        >

                                    @endif

                                </div>


                                <div class="latest-article-info">

                                    <a href="{{ route('articles.show', $latest->slug) }}">
                                        {{ $latest->title }}
                                    </a>

                                    <div class="latest-article-date">
                                        {{ $latest->created_at->translatedFormat('d F Y') }}
                                    </div>

                                </div>

                            </div>

                        @endforeach

                    </div>

                </div>

            </aside>


        </div>

    </div>

</section>

@endsection