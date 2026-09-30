@extends('layouts.admin')

@section('title', 'Kategori')

@section('content')

<style>
    /* ==================================================
       PAGE
    ================================================== */

    .category-page {
       width: 100%;
        max-width: 930px;
        margin: 0 auto;
        }


    /* ==================================================
       HEADER
    ================================================== */

    .category-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;

        margin-bottom: 24px;
    }

    .category-header-left h1 {
        margin: 0 0 10px;

        color: #123d91;

        font-size: 26px;
        font-weight: 700;
        line-height: 1.2;
    }

    .category-breadcrumb {
        display: flex;
        align-items: center;

        gap: 6px;
        
        font-size: 14px;
        font-weight: 600;
    }

    .category-breadcrumb .home {
        color: #0759d1;
        text-decoration: none;
        cursor: pointer;
    }

    .category-breadcrumb .home:hover {
        text-decoration: underline;
    }

    .category-breadcrumb .separator,
    .category-breadcrumb .current {
        color: #999;
    }


    /* ==================================================
       BUTTON TAMBAH
    ================================================== */

    .btn-add-category {
        display: inline-flex;
        align-items: center;
        justify-content: center;

        gap: 6px;

        height: 40px;

        padding: 0 13px;

        background: #0e57d8;
        color: white;

        border: none;
        border-radius: 7px;

        text-decoration: none;

        font-family: inherit;
        font-size: 14px;
        font-weight: 700;

        cursor: pointer;

        transition:
            background .15s ease,
            transform .15s ease;
    }

    .btn-add-category:hover {
        background: #0848b8;
    }

    .btn-add-category i {
        font-size: 13px;
    }


    /* ==================================================
       SUCCESS
    ================================================== */

    .category-success {
        margin-bottom: 16px;

        padding: 10px 13px;

        background: #def2e8;
        color: #238653;

        border-radius: 7px;

        font-size: 13px;
        font-weight: 600;
    }


    /* ==================================================
       TABLE BOX
    ================================================== */

    .category-table-box {
        width: 100%;

        background: white;

        border: 1px solid #dbe7f7;
        border-radius: 8px;

        overflow: hidden;
    }


    /* ==================================================
       TABLE
    ================================================== */

    .category-table {
        width: 100%;

        border-collapse: collapse;

        table-layout: fixed;
    }


    /* ==================================================
       TABLE HEADER
    ================================================== */

    .category-table thead {
        background: #eaf2ff;
    }

    .category-table th {
        height: 52px;

        padding: 0 14px;

        color: #222;

        font-size: 14px;
        font-weight: 700;

        text-align: left;

        vertical-align: middle;
    }

    .category-table th:nth-child(1) {
        width: 65px;

        text-align: center;
    }

    .category-table th:nth-child(2) {
        width: auto;
    }

    .category-table th:nth-child(3) {
        width: 180px;
    }

    .category-table th:nth-child(4) {
        width: 140px;
    }

    .category-table th:nth-child(5) {
        width: 145px;
    }


    /* ==================================================
       TABLE ROW
    ================================================== */

    .category-table tbody tr {
        border-bottom: 1px solid #e9edf3;

        transition: background .15s ease;
    }

    .category-table tbody tr:last-child {
        border-bottom: none;
    }

    .category-table tbody tr:hover {
        background: #fafcff;
    }


    /* ==================================================
       TABLE CELL
    ================================================== */

    .category-table td {
        height: 60px;

        padding: 9px 14px;

        color: #222;

        font-size: 14px;

        vertical-align: middle;
    }


    /* ==================================================
       NOMOR
    ================================================== */

    .category-number {
        text-align: center;

        color: #333;

        font-size: 15px !important;
        font-weight: 700;
    }


    /* ==================================================
       NAMA KATEGORI
    ================================================== */

    .category-name {
        color: #222;

        font-size: 14px;
        font-weight: 700;

        line-height: 1.3;

        word-break: break-word;
    }


    /* ==================================================
       SLUG
    ================================================== */

    .category-slug {
        color: #888;

        font-size: 13px;
        font-weight: 500;

        line-height: 1.3;

        word-break: break-word;
    }


    /* ==================================================
       DIGUNAKAN UNTUK
    ================================================== */

    .category-type {
        color: #555;

        font-size: 13px;
        font-weight: 600;

        line-height: 1.3;
    }


    /* ==================================================
       AKSI
    ================================================== */

    .category-actions {
        display: flex;
        align-items: center;

        gap: 7px;
    }

    .category-actions form {
        margin: 0;
    }

    .category-action {
        width: 34px;
        height: 34px;

        display: inline-flex;
        align-items: center;
        justify-content: center;

        padding: 0;

        border: none;
        border-radius: 7px;

        text-decoration: none;

        font-size: 14px;

        cursor: pointer;

        transition:
            background .15s ease,
            transform .15s ease;
    }

    .category-action:hover {
        transform: translateY(-1px);
    }


    /* EDIT */

    .category-action.edit {
        background: #fff5df;
        color: #f2a719;
    }

    .category-action.edit:hover {
        background: #ffedc5;
    }


    /* DELETE */

    .category-action.delete {
        background: #ffdede;
        color: #ed4a4a;
    }

    .category-action.delete:hover {
        background: #ffcaca;
    }


    /* ==================================================
       EMPTY
    ================================================== */

    .category-empty {
        padding: 45px 20px;

        color: #999;

        font-size: 14px;

        text-align: center;
    }


    /* ==================================================
       TABLE FOOTER
    ================================================== */

    .category-table-footer {
        min-height: 78px;

        display: flex;
        align-items: center;
        justify-content: space-between;

        gap: 20px;

        padding: 14px 24px;

        border-top: 1px solid #e5eaf2;

        background: white;
    }


    /* ==================================================
       TOTAL DATA
    ================================================== */

    .category-total {
        color: #929292;

        font-size: 13px;
        font-weight: 600;

        white-space: nowrap;
    }


    /* ==================================================
       PAGINATION
    ================================================== */

    .category-pagination {
        display: flex;
        align-items: center;

        gap: 6px;
    }

    .pagination-button {
        width: 32px;
        height: 32px;

        display: inline-flex;
        align-items: center;
        justify-content: center;

        border: 1px solid #cfcfcf;
        border-radius: 6px;

        background: white;
        color: #777;

        font-size: 13px;
        font-weight: 600;

        text-decoration: none;

        transition:
            background .15s ease,
            border-color .15s ease,
            color .15s ease;
    }

    .pagination-button:hover {
        background: #f5f8fc;

        border-color: #b8c8df;

        color: #16418f;
    }

    .pagination-button.active {
        background: #0e57d8;

        border-color: #0e57d8;

        color: white;

        font-weight: 700;
    }

    .pagination-button.disabled {
        background: white;

        color: #bbb;

        border-color: #ddd;

        cursor: default;
    }


    /* ==================================================
       RESPONSIVE
    ================================================== */

    @media (max-width: 900px) {

        .category-page {
            max-width: 100%;
        }

        .category-table th,
        .category-table td {
            font-size: 13px;
        }

        .category-table th:nth-child(3) {
            width: 160px;
        }

        .category-table th:nth-child(4) {
            width: 125px;
        }

        .category-table th:nth-child(5) {
            width: 125px;
        }
    }


    @media (max-width: 650px) {

        .category-header {
            flex-direction: column;

            gap: 16px;
        }

        .btn-add-category {
            width: 100%;
        }

        .category-table {
            min-width: 700px;
        }

        .category-table-box {
            overflow-x: auto;
        }

        .category-table-footer {
            flex-direction: column;

            align-items: flex-start;

            gap: 12px;
        }

        .category-pagination {
            align-self: flex-end;
        }
    }
</style>


<div class="category-page">


    {{-- ==================================================
         HEADER
    ================================================== --}}

    <div class="category-header">

        <div class="category-header-left">

            <h1>
                Kategori
            </h1>

            <div class="category-breadcrumb">

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
                    Kategori
                </span>

            </div>

        </div>


        <a
            href="{{ route('admin.categories.create') }}"
            class="btn-add-category"
        >

            <i class="fa-solid fa-plus"></i>

            Tambah Kategori

        </a>

    </div>


    {{-- ==================================================
         SUCCESS MESSAGE
    ================================================== --}}

    @if(session('success'))

        <div class="category-success">
            {{ session('success') }}
        </div>

    @endif


    {{-- ==================================================
       TABLE
    ================================================== --}}

    <div class="category-table-box">


        @if($categories->count())


            <table class="category-table">


                {{-- ================= TABLE HEADER ================= --}}

                <thead>

                    <tr>

                        <th>
                            No
                        </th>

                        <th>
                            Nama Kategori
                        </th>

                        <th>
                            Slug
                        </th>

                        <th>
                            Jenis Kategori
                        </th>

                        <th>
                            Aksi
                        </th>

                    </tr>

                </thead>


                {{-- ================= TABLE BODY ================= --}}

                <tbody>

                    @foreach($categories as $category)

                        <tr>


                            {{-- NOMOR --}}

                            <td class="category-number">

                                {{ $categories->firstItem() + $loop->index }}

                            </td>


                            {{-- NAMA --}}

                            <td>

                                <div class="category-name">

                                    {{ $category->name }}

                                </div>

                            </td>


                            {{-- SLUG --}}

                            <td>

                                <div class="category-slug">

                                    {{ $category->slug }}

                                </div>

                            </td>


                            {{-- DIGUNAKAN UNTUK --}}

                            <td>

                                <div class="category-type">

                                    {{ $category->category_type }}

                                </div>

                            </td>


                            {{-- AKSI --}}

                            <td>

                                <div class="category-actions">


                                    {{-- EDIT --}}

                                    <a
                                        href="{{ route(
                                            'admin.categories.edit',
                                            $category->category_source . '-' . $category->id
                                        ) }}"
                                        class="category-action edit"
                                        title="Edit"
                                    >

                                        <i class="fa-solid fa-pen-to-square"></i>

                                    </a>


                                    {{-- DELETE --}}

                                    <form
                                        action="{{ route(
                                            'admin.categories.destroy',
                                            $category->category_source . '-' . $category->id
                                        ) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus kategori ini?')"
                                    >

                                        @csrf

                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="category-action delete"
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


            {{-- ==================================================
                 FOOTER + PAGINATION
            ================================================== --}}

            <div class="category-table-footer">


                {{-- TOTAL DATA --}}

                <div class="category-total">

                    Menampilkan
                    {{ $categories->firstItem() }}
                    -
                    {{ $categories->lastItem() }}
                    dari
                    {{ $categories->total() }}
                    data

                </div>


                {{-- PAGINATION --}}

                @if($categories->hasPages())

                    <div class="category-pagination">


                        {{-- PREVIOUS --}}

                        @if($categories->onFirstPage())

                            <span class="pagination-button disabled">
                                &lt;
                            </span>

                        @else

                            <a
                                href="{{ $categories->previousPageUrl() }}"
                                class="pagination-button"
                            >
                                &lt;
                            </a>

                        @endif


                        {{-- NOMOR HALAMAN --}}

                        @for(
                            $page = 1;
                            $page <= $categories->lastPage();
                            $page++
                        )

                            @if($page == $categories->currentPage())

                                <span class="pagination-button active">
                                    {{ $page }}
                                </span>

                            @else

                                <a
                                    href="{{ $categories->url($page) }}"
                                    class="pagination-button"
                                >
                                    {{ $page }}
                                </a>

                            @endif

                        @endfor


                        {{-- NEXT --}}

                        @if($categories->hasMorePages())

                            <a
                                href="{{ $categories->nextPageUrl() }}"
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


            {{-- ==================================================
                 EMPTY DATA
            ================================================== --}}

            <div class="category-empty">

                Belum ada kategori.

            </div>


        @endif


    </div>


</div>

@endsection