@extends('layouts.admin')

@section('title', 'Artikel')

@section('content')

<style>
    /* =========================================================
       HALAMAN ARTIKEL
    ========================================================= */

    .article-page {
        width: 100%;
        max-width: 930px;
        margin: 0 auto;
    }


    /* =========================================================
       HEADER
    ========================================================= */

    .article-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;

        margin-bottom: 24px;
    }

    .article-header-left h1 {
        margin: 0 0 10px;

        font-size: 27px;
        font-weight: 700;

        color: #123d91;
    }


    /* =========================================================
       BREADCRUMB
    ========================================================= */

    .breadcrumb {
        display: flex;
        align-items: center;

        gap: 6px;

        font-size: 15px;
        font-weight: 600;
    }

    .breadcrumb .home {
        color: #0759d1;
    }

    .breadcrumb .separator,
    .breadcrumb .current {
        color: #999;
    }


    /* =========================================================
       BUTTON TAMBAH
    ========================================================= */

    .btn-add-article {
        display: inline-flex;
        align-items: center;
        justify-content: center;

        gap: 6px;

        height: 40px;

        padding: 0 13px;

        background: #0e57d8;
        color: white;

        border-radius: 6px;

        text-decoration: none;

        font-size: 14px;
        font-weight: 700;

        transition: .15s ease;
    }

    .btn-add-article:hover {
        background: #0848b8;
    }

    .btn-add-article i {
        font-size: 13px;
    }


    /* =========================================================
       SUCCESS
    ========================================================= */

    .article-success {
        margin-bottom: 16px;

        padding: 10px 13px;

        background: #def2e8;
        color: #238653;

        border-radius: 6px;

        font-size: 13px;
        font-weight: 600;
    }


    /* =========================================================
       TABLE BOX
    ========================================================= */

    .article-table-box {
        width: 100%;

        background: white;

        border: 1px solid #dbe7f7;

        border-radius: 8px;

        overflow: hidden;
    }


    /* =========================================================
       TABLE
    ========================================================= */

    .article-table {
        width: 100%;

        border-collapse: collapse;

        table-layout: fixed;
    }

    .article-table thead {
        background: #eaf2ff;
    }

    .article-table th {
        height: 52px;

        padding: 0 12px;

        color: #111;

        font-size: 15px;
        font-weight: 700;

        text-align: left;

        vertical-align: middle;
    }


    /* LEBAR KOLOM */

    .article-table th:nth-child(1) {
        width: 55px;

        text-align: center;
    }

    .article-table th:nth-child(2) {
        width: 350px;
    }

    .article-table th:nth-child(3) {
        width: 145px;
    }

    .article-table th:nth-child(4) {
        width: 115px;
    }

    .article-table th:nth-child(5) {
        width: 145px;
    }


    /* =========================================================
       ROW
    ========================================================= */

    .article-table tbody tr {
        border-bottom: 1px solid #e5eaf2;
    }

    .article-table tbody tr:last-child {
        border-bottom: none;
    }

    .article-table td {
        height: 86px;

        padding: 10px 12px;

        font-size: 14px;

        color: #111;

        vertical-align: middle;
    }


    /* =========================================================
       NOMOR
    ========================================================= */

    .article-number {
        text-align: center;

        font-size: 16px !important;

        font-weight: 700;
    }


    /* =========================================================
       JUDUL
    ========================================================= */

    .article-title {
        display: flex;
        flex-direction: column;

        gap: 4px;
    }

    .article-title-main {
        font-size: 15px;

        line-height: 1.25;

        font-weight: 700;

        color: #111;

        word-break: break-word;
    }

    .article-date {
        font-size: 12px;

        color: #888;

        font-weight: 600;
    }


    /* =========================================================
       KATEGORI
    ========================================================= */

    .article-category {
        color: #888;

        font-size: 14px;

        font-weight: 600;
    }


    /* =========================================================
       STATUS
    ========================================================= */

    .article-status {
        display: inline-flex;
        align-items: center;
        justify-content: center;

        min-width: 65px;

        padding: 5px 9px;

        border-radius: 6px;

        font-size: 12px;
        font-weight: 700;
    }

    .article-status.published {
        background: #def2e8;
        color: #42a878;
    }

    .article-status.draft {
        background: #fff3d9;
        color: #d89500;
    }


    /* =========================================================
       AKSI
    ========================================================= */

    .article-actions {
        display: flex;

        align-items: center;

        gap: 7px;
    }

    .article-actions form {
        margin: 0;
    }

    .article-action {
        width: 32px;
        height: 32px;

        display: flex;

        align-items: center;
        justify-content: center;

        border: none;

        border-radius: 6px;

        text-decoration: none;

        cursor: pointer;

        font-size: 14px;

        transition: .15s ease;
    }


    /* LIHAT */

    .article-action.view {
        background: #edf4ff;
        color: #16418f;
    }

    .article-action.view:hover {
        background: #dceaff;
    }


    /* EDIT */

    .article-action.edit {
        background: #fff5df;
        color: #f2a719;
    }

    .article-action.edit:hover {
        background: #ffedc5;
    }


    /* HAPUS */

    .article-action.delete {
        background: #ffdede;
        color: #ed4a4a;
    }

    .article-action.delete:hover {
        background: #ffcaca;
    }


    /* =========================================================
       FOOTER
    ========================================================= */

    .article-table-footer {
        min-height: 82px;

        display: flex;

        align-items: center;

        justify-content: space-between;

        padding: 16px 24px;
    }

    .article-total {
        color: #929292;

        font-size: 13px;

        font-weight: 600;
    }


    /* =========================================================
       PAGINATION
    ========================================================= */

    .article-pagination {
        display: flex;

        align-items: center;

        gap: 6px;
    }

    .pagination-button {
        width: 32px;
        height: 32px;

        display: flex;

        align-items: center;
        justify-content: center;

        border: 1px solid #aaa;

        border-radius: 6px;

        background: white;

        color: #999;

        font-size: 14px;

        text-decoration: none;

        transition: .15s ease;
    }

    .pagination-button:hover {
        background: #f4f4f4;
    }

    .pagination-button.active {
        background: #0e57d8;

        border-color: #0e57d8;

        color: white;

        font-weight: 700;
    }

    .pagination-button.disabled {
        color: #bbb;

        background: white;

        cursor: default;
    }


    /* =========================================================
       EMPTY
    ========================================================= */

    .article-empty {
        text-align: center;

        padding: 45px 20px;

        color: #999;

        font-size: 14px;
    }


    /* =========================================================
       RESPONSIVE
    ========================================================= */

    @media (max-width: 900px) {

        .article-page {
            max-width: 100%;
        }

        .article-header-left h1 {
            font-size: 25px;
        }

        .article-table th,
        .article-table td {
            font-size: 13px;
        }

        .article-table th:nth-child(2) {
            width: 300px;
        }

        .article-table th:nth-child(3) {
            width: 125px;
        }

        .article-table th:nth-child(4) {
            width: 105px;
        }

        .article-table th:nth-child(5) {
            width: 130px;
        }

    }


    @media (max-width: 700px) {

        .article-header {
            flex-direction: column;

            gap: 15px;
        }

        .article-table-box {
            overflow-x: auto;
        }

        .article-table {
            min-width: 700px;
        }

        .article-table-footer {
            flex-direction: column;

            align-items: flex-start;

            gap: 12px;

            padding: 16px;
        }

    }
</style>


<div class="article-page">


    {{-- =====================================================
         HEADER
    ====================================================== --}}

    <div class="article-header">

        <div class="article-header-left">

            <h1>
                Artikel
            </h1>

            <div class="breadcrumb">

                <span class="home">
                    Dashboard
                </span>

                <span class="separator">
                    /
                </span>

                <span class="current">
                    Artikel
                </span>

            </div>

        </div>


        <a
            href="{{ route('admin.articles.create') }}"
            class="btn-add-article"
        >

            <i class="fa-solid fa-plus"></i>

            Tambah Artikel

        </a>

    </div>


    {{-- =====================================================
         SUCCESS
    ====================================================== --}}

    @if(session('success'))

        <div class="article-success">

            {{ session('success') }}

        </div>

    @endif


    {{-- =====================================================
         TABLE
    ====================================================== --}}

    <div class="article-table-box">


        @if($articles->count())


            <table class="article-table">


                {{-- ================= HEADER TABLE ================= --}}

                <thead>

                    <tr>

                        <th>
                            No
                        </th>

                        <th>
                            Judul
                        </th>

                        <th>
                            Kategori
                        </th>

                        <th>
                            Status
                        </th>

                        <th>
                            Aksi
                        </th>

                    </tr>

                </thead>


                {{-- ================= DATA ================= --}}

                <tbody>


                    @foreach($articles as $article)


                        <tr>


                            {{-- NO --}}

                            <td class="article-number">

                                {{ $articles->firstItem() + $loop->index }}

                            </td>


                            {{-- JUDUL --}}

                            <td>

                                <div class="article-title">

                                    <div class="article-title-main">

                                        {{ $article->title }}

                                    </div>


                                    <div class="article-date">

                                        {{ $article->created_at->format('d F Y') }}

                                    </div>

                                </div>

                            </td>


                            {{-- KATEGORI --}}

                            <td>

                                <span class="article-category">

                                    {{ $article->category?->name ?? '-' }}

                                </span>

                            </td>


                            {{-- STATUS --}}

                            <td>

                                @if($article->status === 'draft')

                                    <span class="article-status draft">

                                        Draft

                                    </span>

                                @else

                                    <span class="article-status published">

                                        Publish

                                    </span>

                                @endif

                            </td>


                            {{-- AKSI --}}

                            <td>

                                <div class="article-actions">


                                    {{-- LIHAT --}}

                                    <a
                                        href="{{ route('admin.articles.show', $article) }}"
                                        class="article-action view"
                                        title="Lihat"
                                    >

                                        <i class="fa-solid fa-eye"></i>

                                    </a>


                                    {{-- EDIT --}}

                                    <a
                                        href="{{ route('admin.articles.edit', $article) }}"
                                        class="article-action edit"
                                        title="Edit"
                                    >

                                        <i class="fa-solid fa-pen-to-square"></i>

                                    </a>


                                    {{-- HAPUS --}}

                                    <form
                                        action="{{ route('admin.articles.destroy', $article) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus artikel ini?')"
                                    >

                                        @csrf

                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="article-action delete"
                                            title="Hapus"
                                        >

                                            <i class="fa-solid fa-trash-can"></i>

                                        </button>

                                    </form>


                                </div>

                            </td>


                        </tr>


                    @endforeach


                </tbody>


            </table>


            {{-- =================================================
                 FOOTER
            ================================================== --}}

            <div class="article-table-footer">


                {{-- TOTAL DATA --}}

                <div class="article-total">

                    Menampilkan

                    {{ $articles->firstItem() }}

                    -

                    {{ $articles->lastItem() }}

                    dari

                    {{ $articles->total() }}

                    data

                </div>


                {{-- =================================================
                     PAGINATION
                ================================================== --}}

                @if($articles->hasPages())


                    <div class="article-pagination">


                        {{-- PREVIOUS --}}

                        @if($articles->onFirstPage())

                            <span class="pagination-button disabled">
                                &lt;
                            </span>

                        @else

                            <a
                                href="{{ $articles->previousPageUrl() }}"
                                class="pagination-button"
                            >
                                &lt;
                            </a>

                        @endif


                        {{-- NOMOR HALAMAN --}}

                        @for(
                            $page = 1;
                            $page <= $articles->lastPage();
                            $page++
                        )


                            @if($page == $articles->currentPage())

                                <span class="pagination-button active">

                                    {{ $page }}

                                </span>

                            @else

                                <a
                                    href="{{ $articles->url($page) }}"
                                    class="pagination-button"
                                >

                                    {{ $page }}

                                </a>

                            @endif


                        @endfor


                        {{-- NEXT --}}

                        @if($articles->hasMorePages())

                            <a
                                href="{{ $articles->nextPageUrl() }}"
                                class="pagination-button"
                            >

                                &gt;

                            </a>

                        @else

                            <span class="pagination-button disabled">

                                &gt;

                            </span>

                        @endif


                    </div>

                @endif


            </div>


        @else


            {{-- =================================================
                 EMPTY
            ================================================== --}}

            <div class="article-empty">

                Belum ada artikel.

            </div>


        @endif


    </div>


</div>

@endsection