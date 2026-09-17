@extends('layouts.app')

@section('title', 'Artikel')

@section('content')

<style>
    .articles-page {
        width: 100%;
        background: #f8fafc;
        padding: 34px 40px 65px;
    }

    .articles-container {
        width: 100%;
        max-width: 1200px;
        margin: 0 auto;
    }

    /* =========================
       HEADER
    ========================= */

    .articles-header {
        text-align: center;
        margin-bottom: 30px;
    }

    .articles-title {
        margin: 0;
        color: #16418f;
        font-size: 24px;
        line-height: 1.3;
        font-weight: 700;
    }

    .articles-breadcrumb {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 7px;
        margin-top: 8px;
        font-size: 12px;
        line-height: 1.4;
        font-weight: 400;
    }

    .articles-breadcrumb a {
        color: #16418f;
        text-decoration: none;
    }

    .articles-breadcrumb a:hover {
        text-decoration: underline;
    }

    .articles-breadcrumb .separator {
        color: #999;
    }

    .articles-breadcrumb .current {
        color: #777;
    }


    /* =========================
       CONTENT
    ========================= */

    .articles-layout {
        display: grid;
        grid-template-columns: minmax(0, 1fr) 260px;
        gap: 28px;
        align-items: start;
    }


    /* =========================
       ARTICLE GRID
    ========================= */

    .article-list-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
        width: 100%;
    }

    .article-list-card {
        background: #fff;
        border-radius: 8px;
        overflow: hidden;
        border: 1px solid #e5e7eb;
        display: flex;
        flex-direction: column;
        transition: transform .2s ease, box-shadow .2s ease;
    }

    .article-list-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 28px rgba(15, 23, 42, .10);
    }

    .article-list-image {
        width: 100%;
        height: 175px;
        background: #dbeafe;
        overflow: hidden;
        display: block;
    }

    .article-list-image img {
        width: 100%;
        height: 100%;
        display: block;
        object-fit: cover;
    }

    .article-list-content {
        padding: 17px;
    }

    .article-list-date {
        margin-bottom: 7px;
        color: #64748b;
        font-size: 12px;
        line-height: 1.4;
        font-weight: 400;
    }

    .article-list-content h3 {
        margin: 0 0 8px;
        color: #1e3a8a;
        font-size: 17px;
        line-height: 1.35;
        font-weight: 700;
    }

    .article-list-content p {
        margin: 0 0 13px;
        color: #64748b;
        font-size: 13px;
        line-height: 1.6;
        font-weight: 400;
    }

    .article-list-content .text-link {
        display: inline-block;
        color: #155eef;
        font-size: 13px;
        line-height: 1.4;
        font-weight: 600;
        text-decoration: none;
    }

    .article-list-content .text-link:hover {
        text-decoration: underline;
    }


    /* =========================
       KATEGORI BERITA
    ========================= */

    .article-category {
        background: #fff;
        border: 1px solid #dbe2ea;
        border-radius: 7px;
        overflow: hidden;
    }

    .article-category-title {
        margin: 0;
        padding: 15px 17px;
        background: #16418f;
        color: #fff;
        font-size: 17px;
        line-height: 1.4;
        font-weight: 700;
    }

    .article-category-list {
        padding: 7px 0;
    }

    .article-category-list a {
        display: block;
        padding: 9px 17px;
        color: #222;
        font-size: 14px;
        line-height: 1.4;
        font-weight: 400;
        text-decoration: none;
        transition: color .2s ease, background .2s ease;
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
   PAGINATION
========================= */

.articles-pagination {
    width: calc(100% + 288px);

    display: flex;
    justify-content: center;
    align-items: center;

    margin-top: 32px;

    gap: 7px;
    flex-wrap: wrap;
}

.articles-pagination a,
.articles-pagination span {
    width: 36px;
    height: 36px;

    display: inline-flex;
    align-items: center;
    justify-content: center;

    border-radius: 6px;

    font-size: 13px;
    line-height: 1;
    font-weight: 500;

    text-decoration: none;

    box-sizing: border-box;
}

.articles-pagination a {
    color: #0645c0;
    background: #ffffff;
    border: 1px solid #dbe2ea;

    transition:
        background 0.2s ease,
        border-color 0.2s ease,
        color 0.2s ease;
}

.articles-pagination a:hover {
    background: #f1f5f9;
    border-color: #0645c0;
}

.articles-pagination .active {
    color: #ffffff;
    background: #0645c0;
    border-color: #0645c0;
    font-weight: 600;
}

.articles-pagination .disabled {
    color: #aaa;
    background: #f8fafc;
    border-color: #e5e7eb;
}


    /* =========================
       RESPONSIVE
    ========================= */

    @media (max-width: 1050px) {

        .articles-layout {
            grid-template-columns: minmax(0, 1fr) 230px;
            gap: 20px;
        }

        .article-list-grid {
            grid-template-columns: repeat(2, 1fr);
        }

    }


    @media (max-width: 800px) {

        .articles-page {
            padding: 30px 25px 55px;
        }

        .articles-layout {
            grid-template-columns: 1fr;
        }

        .article-category {
            order: -1;
        }

        .article-list-grid {
            grid-template-columns: repeat(2, 1fr);
        }

    }


    @media (max-width: 550px) {

        .articles-page {
            padding: 25px 18px 45px;
        }

        .articles-title {
            font-size: 21px;
        }

        .articles-breadcrumb {
            font-size: 11px;
        }

        .article-list-grid {
            grid-template-columns: 1fr;
        }

        .article-list-image {
            height: 190px;
        }

    }
</style>


<section class="articles-page">

    <div class="articles-container">


        {{-- =========================
             HEADER
        ========================= --}}

        <div class="articles-header">

            <h1 class="articles-title">
                Artikel
            </h1>

            <div class="articles-breadcrumb">

                <a href="{{ route('home') }}">
                    Beranda
                </a>

                <span class="separator">
                    /
                </span>

                <span class="current">
                    Artikel
                </span>

            </div>

        </div>


        {{-- =========================
             LAYOUT ARTIKEL + KATEGORI
        ========================= --}}

        <div class="articles-layout">


            {{-- =========================
                 DAFTAR ARTIKEL
            ========================= --}}

            <div>

                <div class="article-list-grid">

                    @forelse ($articles as $article)

                        <article class="article-list-card">

                            <div class="article-list-image">

                                @if ($article->image)

                                    <img
                                        src="{{ asset('storage/' . $article->image) }}"
                                        alt="{{ $article->title }}"
                                    >

                                @else

                                    <img
                                        src="{{ asset('storage/article/kegiatan-sekolah.PNG') }}"
                                        alt="{{ $article->title }}"
                                    >

                                @endif

                            </div>


                            <div class="article-list-content">

                                <div class="article-list-date">

                                    {{ $article->created_at->translatedFormat('d F Y') }}

                                </div>


                                <h3>
                                    {{ $article->title }}
                                </h3>


                                <p>

                                    {{ Str::limit(strip_tags($article->content), 120) }}

                                </p>


                                <a
                                    href="{{ route('articles.show', $article->slug) }}"
                                    class="text-link"
                                >
                                    Baca Selengkapnya →
                                </a>

                            </div>

                        </article>

                    @empty

                        <p>
                            Belum ada artikel.
                        </p>

                    @endforelse

                </div>


            {{-- PAGINATION --}}

            @if ($articles->hasPages())

                <div class="articles-pagination">

                    {{-- SEBELUMNYA --}}
                    @if ($articles->onFirstPage())

                        <span class="disabled">
                            ‹
                        </span>

                    @else

                        <a href="{{ $articles->previousPageUrl() }}">
                            ‹
                        </a>

                    @endif


                    {{-- NOMOR HALAMAN --}}
                    @foreach ($articles->getUrlRange(1, $articles->lastPage()) as $page => $url)

                        @if ($page == $articles->currentPage())

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
                    @if ($articles->hasMorePages())

                        <a href="{{ $articles->nextPageUrl() }}">
                            ›
                        </a>

                    @else

                        <span class="disabled">
                            ›
                        </span>

                    @endif

                </div>

            @endif

            </div>


            {{-- =========================
                 KATEGORI BERITA
            ========================= --}}

            <aside class="article-category">

                <h2 class="article-category-title">
                    Kategori Berita
                </h2>


                <div class="article-category-list">

                    <a
                        href="{{ route('articles.index') }}"
                        class="{{ request('category') ? '' : 'active' }}"
                    >
                        Semua Berita
                    </a>


                    @foreach ($categories as $category)

                        <a
                            href="{{ route('articles.index', ['category' => $category->slug]) }}"
                            class="{{ request('category') === $category->slug ? 'active' : '' }}"
                        >
                            {{ $category->name }}
                        </a>

                    @endforeach

                </div>

            </aside>


        </div>

    </div>

</section>

@endsection