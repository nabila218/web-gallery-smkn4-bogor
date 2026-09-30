@extends('layouts.admin')

@section('title', 'Galeri')

@section('content')

<style>

    /* =========================================================
       HALAMAN GALERI
    ========================================================= */

    .gallery-page {
        width: 100%;
        max-width: 930px;
        margin: 0 auto;
    }


    /* =========================================================
       HEADER
    ========================================================= */

    .gallery-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 24px;
}

    .gallery-header-left h1 {
        margin: 0 0 10px;
        font-size: 26px;
        font-weight: 700;
        line-height: 1.2;
        color: #123d91;
    }


    /* =========================================================
       BREADCRUMB
    ========================================================= */

    .gallery-breadcrumb {
    display: flex;
    align-items: center;
    gap: 6px;
    margin: 0;
    font-size: 14px;
    font-weight: 600;
    }

    .gallery-breadcrumb .home {
        color: #0759d1;
        text-decoration: none;
        cursor: pointer;
    }

    .gallery-breadcrumb .home:hover {
        text-decoration: underline;
    }

    .gallery-breadcrumb .separator,
    .gallery-breadcrumb .current {
        color: #999;
    }


    /* =========================================================
       BUTTON TAMBAH
    ========================================================= */

    .btn-add-gallery {
        display: inline-flex;
        align-items: center;
        justify-content: center;

        gap: 7px;

        height: 40px;

        padding: 0 15px;

        background: #0e57d8;
        color: white;

        border: none;
        border-radius: 7px;

        text-decoration: none;

        font-family: inherit;
        font-size: 14px;
        font-weight: 700;

        cursor: pointer;

        transition: .15s ease;
    }

    .btn-add-gallery:hover {
        background: #0848b8;
    }

    .btn-add-gallery i {
        font-size: 13px;
    }


    /* =========================================================
       SUCCESS
    ========================================================= */

    .gallery-success {
        margin-bottom: 18px;

        padding: 10px 13px;

        background: #def2e8;
        color: #238653;

        border-radius: 7px;

        font-size: 13px;
        font-weight: 600;
    }


    /* =========================================================
   GRID GALERI
========================================================= */

.gallery-grid {
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 22px 20px;
}


/* =========================================================
   CARD
========================================================= */

.gallery-card {
    background: white;

    border: 1px solid #dbe7f7;
    border-radius: 8px;

    overflow: hidden;

    padding: 12px 12px 14px;

    /* jangan dibuat gepeng */
    min-height: 265px;
}


/* =========================================================
   IMAGE
========================================================= */

.gallery-image {
    width: 100%;
    height: 175px;

    object-fit: cover;

    display: block;

    border-radius: 6px;
}


/* =========================================================
   TITLE
========================================================= */

.gallery-title {
    margin-top: 11px;

    min-height: 42px;

    font-size: 16px;
    line-height: 1.25;

    font-weight: 700;

    color: #123d91;
}


/* =========================================================
   ACTIONS
========================================================= */

.gallery-actions {
    display: flex;

    align-items: center;
    justify-content: center;

    gap: 8px;

    margin-top: 9px;
}

.gallery-action {
    width: 34px;
    height: 34px;

    display: flex;
    align-items: center;
    justify-content: center;

    border: none;
    border-radius: 6px;

    text-decoration: none;

    cursor: pointer;

    font-size: 15px;

    transition: .15s ease;
}

    /* =========================================================
       LIHAT
    ========================================================= */

    .gallery-action.view {
        background: #edf4ff;

        color: #16418f;
    }

    .gallery-action.view:hover {
        background: #dceaff;
    }


    /* =========================================================
       EDIT
    ========================================================= */

    .gallery-action.edit {
        background: #fff5df;

        color: #f2a719;
    }

    .gallery-action.edit:hover {
        background: #ffedc5;
    }


    /* =========================================================
       HAPUS
    ========================================================= */

    .gallery-action.delete {
        background: #ffdede;

        color: #ed4a4a;
    }

    .gallery-action.delete:hover {
        background: #ffcaca;
    }


    /* =========================================================
       FOOTER
    ========================================================= */

    .gallery-footer {
        min-height: 85px;

        display: flex;

        align-items: center;
        justify-content: space-between;

        margin-top: 8px;
    }


    /* =========================================================
       TOTAL DATA
    ========================================================= */

    .gallery-total {
        color: #929292;

        font-size: 14px;
        font-weight: 600;
    }


    /* =========================================================
       PAGINATION
    ========================================================= */

    .gallery-pagination {
        display: flex;

        align-items: center;

        gap: 6px;
    }

    .pagination-button {
        width: 34px;
        height: 34px;

        display: flex;

        align-items: center;
        justify-content: center;

        border: 1px solid #aaa;

        border-radius: 6px;

        background: white;

        color: #999;

        font-size: 14px;
        font-weight: 600;

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

    .gallery-empty {
        padding: 50px 20px;

        background: white;

        border: 1px solid #dbe7f7;

        border-radius: 8px;

        text-align: center;

        color: #999;

        font-size: 14px;
    }


    /* =========================================================
       RESPONSIVE
    ========================================================= */

    @media (max-width: 900px) {

        .gallery-page {
            max-width: 100%;
        }

        .gallery-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

    }


    @media (max-width: 600px) {

        .gallery-grid {
            grid-template-columns: 1fr;
        }

        .gallery-header {
            flex-direction: column;

            gap: 16px;
        }

        .btn-add-gallery {
            width: 100%;
        }

        .gallery-footer {
            flex-direction: column;

            align-items: flex-start;

            gap: 14px;

            padding: 18px 0;
        }

    }

</style>


<div class="gallery-page">


    {{-- =====================================================
         HEADER
    ====================================================== --}}

    <div class="gallery-header">

        <div class="gallery-header-left">

            <h1>
                Galeri
            </h1>

            <div class="gallery-breadcrumb">

                <a
                    href="{{ route('admin.dashboard') }}"
                    class="home"
                >
                    Dashboard
                </a>

                <span class="separator">
                    /
                </span>

                <span class="current">
                    Galeri
                </span>

            </div>

        </div>


        <a
            href="{{ route('admin.photos.create') }}"
            class="btn-add-gallery"
        >

            <i class="fa-solid fa-plus"></i>

            Tambah Galeri

        </a>

    </div>


    {{-- =====================================================
         SUCCESS
    ====================================================== --}}

    @if(session('success'))

        <div class="gallery-success">

            {{ session('success') }}

        </div>

    @endif


    {{-- =====================================================
         GALERI
    ====================================================== --}}

    @if($photos->count())

        <div class="gallery-grid">

            @foreach($photos as $photo)

                <div class="gallery-card">


                    {{-- ================= IMAGE ================= --}}

                    <img
                        src="{{ asset('storage/' . $photo->image) }}"
                        alt="{{ $photo->title }}"
                        class="gallery-image"
                    >


                    {{-- ================= TITLE ================= --}}

                    <div class="gallery-title">

                        {{ $photo->title }}

                    </div>


                    {{-- ================= ACTIONS ================= --}}

                    <div class="gallery-actions">


                        {{-- LIHAT --}}

                        <a
                            href="{{ route('admin.photos.show', $photo) }}"
                            class="gallery-action view"
                            title="Lihat"
                        >

                            <i class="fa-solid fa-eye"></i>

                        </a>


                        {{-- EDIT --}}

                        <a
                            href="{{ route('admin.photos.edit', $photo) }}"
                            class="gallery-action edit"
                            title="Edit"
                        >

                            <i class="fa-solid fa-pen-to-square"></i>

                        </a>


                        {{-- HAPUS --}}

                        <form
                            action="{{ route('admin.photos.destroy', $photo) }}"
                            method="POST"
                            onsubmit="return confirm('Yakin ingin menghapus galeri ini?')"
                        >

                            @csrf

                            @method('DELETE')

                            <button
                                type="submit"
                                class="gallery-action delete"
                                title="Hapus"
                            >

                                <i class="fa-solid fa-trash-can"></i>

                            </button>

                        </form>

                    </div>

                </div>

            @endforeach

        </div>


        {{-- =================================================
             FOOTER + PAGINATION
        ================================================== --}}

        <div class="gallery-footer">


            {{-- TOTAL DATA --}}

            <div class="gallery-total">

                Menampilkan

                {{ $photos->firstItem() }}

                -

                {{ $photos->lastItem() }}

                dari

                {{ $photos->total() }}

                data

            </div>


            {{-- PAGINATION --}}

            @if($photos->hasPages())

                <div class="gallery-pagination">


                    {{-- PREVIOUS --}}

                    @if($photos->onFirstPage())

                        <span class="pagination-button disabled">
                            &lt;
                        </span>

                    @else

                        <a
                            href="{{ $photos->previousPageUrl() }}"
                            class="pagination-button"
                        >
                            &lt;
                        </a>

                    @endif


                    {{-- NOMOR HALAMAN --}}

                    @for(
                        $page = 1;
                        $page <= $photos->lastPage();
                        $page++
                    )

                        @if($page == $photos->currentPage())

                            <span class="pagination-button active">
                                {{ $page }}
                            </span>

                        @else

                            <a
                                href="{{ $photos->url($page) }}"
                                class="pagination-button"
                            >
                                {{ $page }}
                            </a>

                        @endif

                    @endfor


                    {{-- NEXT --}}

                    @if($photos->hasMorePages())

                        <a
                            href="{{ $photos->nextPageUrl() }}"
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

        <div class="gallery-empty">

            Belum ada foto galeri.

        </div>

    @endif

</div>

@endsection