@extends('layouts.admin')

@section('title', 'Pesan Pengunjung')

@section('content')

<style>
    /* =========================================================
       HALAMAN PESAN
    ========================================================= */

    .message-page {
        width: 100%;
        max-width: 930px;
        margin: 0 auto;
    }


    /* =========================================================
       HEADER
    ========================================================= */

    .message-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;

        margin-bottom: 26px;
    }

    .message-header-left h1 {
        margin: 0 0 10px;

        font-size: 27px;
        font-weight: 700;

        color: #123d91;
    }


    /* =========================================================
       BREADCRUMB
    ========================================================= */

    .message-breadcrumb {
        display: flex;
        align-items: center;

        gap: 6px;

        margin: 0;

        font-size: 15px;
        font-weight: 600;
    }

    .message-breadcrumb .home {
    color: #0759d1;
    text-decoration: none;
    cursor: pointer;
    }

    .message-breadcrumb .home:hover {
        text-decoration: underline;
    }

    .message-breadcrumb .separator,
    .message-breadcrumb .current {
        color: #999;
    }


    /* =========================================================
       SUCCESS
    ========================================================= */

    .message-success {
        margin-bottom: 18px;

        padding: 10px 13px;

        background: #def2e8;
        color: #238653;

        border-radius: 7px;

        font-size: 13px;
        font-weight: 600;
    }


    /* =========================================================
       TABLE
    ========================================================= */

    .message-table-wrapper {
        width: 100%;

        overflow-x: auto;

        background: #ffffff;

        border: 1px solid #dbe7f7;
        border-radius: 8px;
    }

    .message-table {
        width: 100%;

        border-collapse: collapse;

        font-size: 14px;
    }

    .message-table th {
        padding: 13px 14px;

        background: #f7faff;

        color: #123d91;

        border-bottom: 1px solid #dbe7f7;

        font-size: 13px;
        font-weight: 700;

        text-align: left;

        white-space: nowrap;
    }

    .message-table td {
        padding: 14px;

        color: #444444;

        border-bottom: 1px solid #edf2f8;

        vertical-align: middle;
    }

    .message-table tbody tr:last-child td {
        border-bottom: none;
    }

    .message-table tbody tr:hover {
        background: #fafcff;
    }


    /* =========================================================
       NOMOR
    ========================================================= */

    .message-number {
        width: 50px;

        color: #777777;

        text-align: center;
    }


    /* =========================================================
       NAMA
    ========================================================= */

    .message-name {
        color: #123d91;

        font-weight: 700;

        white-space: nowrap;
    }


    /* =========================================================
       EMAIL
    ========================================================= */

    .message-email {
        color: #555555;

        white-space: nowrap;
    }


    /* =========================================================
       PESAN
    ========================================================= */

    .message-content {
        min-width: 240px;

        max-width: 360px;

        color: #555555;

        line-height: 1.5;

        word-break: break-word;
    }


    /* =========================================================
       TANGGAL
    ========================================================= */

    .message-date {
        color: #777777;

        white-space: nowrap;

        font-size: 13px;
    }


    /* =========================================================
       AKSI
    ========================================================= */

    .message-actions {
        display: flex;

        align-items: center;
        justify-content: center;

        gap: 8px;
    }

    .message-action {
        width: 34px;
        height: 34px;

        display: flex;
        align-items: center;
        justify-content: center;

        border: none;
        border-radius: 6px;

        cursor: pointer;

        font-size: 15px;

        transition: .15s ease;
    }


    /* =========================================================
       HAPUS
    ========================================================= */

    .message-action.delete {
        background: #ffdede;

        color: #ed4a4a;
    }

    .message-action.delete:hover {
        background: #ffcaca;
    }


    /* =========================================================
       EMPTY
    ========================================================= */

    .message-empty {
        padding: 50px 20px;

        background: #ffffff;

        border: 1px solid #dbe7f7;
        border-radius: 8px;

        text-align: center;

        color: #999999;

        font-size: 14px;
    }


    /* =========================================================
       FOOTER
    ========================================================= */

    .message-footer {
        min-height: 70px;

        display: flex;

        align-items: center;
        justify-content: flex-end;

        margin-top: 8px;
    }

    .message-total {
        color: #929292;

        font-size: 14px;
        font-weight: 600;
    }


    /* =========================================================
       RESPONSIVE
    ========================================================= */

    @media (max-width: 900px) {

        .message-page {
            max-width: 100%;
        }

    }


    @media (max-width: 600px) {

        .message-header {
            flex-direction: column;

            gap: 16px;
        }

        .message-table {
            min-width: 760px;
        }

        .message-footer {
            justify-content: flex-start;

            padding: 18px 0;
        }

    }
</style>


<div class="message-page">


    {{-- =====================================================
         HEADER
    ====================================================== --}}

    <div class="message-header">

        <div class="message-header-left">

            <h1>
                Pesan Pengunjung
            </h1>

<div class="message-breadcrumb">

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
        Pesan Pengunjung
    </span>

</div>

        </div>

    </div>


    {{-- =====================================================
         SUCCESS
    ====================================================== --}}

    @if(session('success'))

        <div class="message-success">
            {{ session('success') }}
        </div>

    @endif


    {{-- =====================================================
         PESAN
    ====================================================== --}}

    @if($messages->count())

        <div class="message-table-wrapper">

            <table class="message-table">

                <thead>

                    <tr>

                        <th class="message-number">
                            No
                        </th>

                        <th>
                            Nama
                        </th>

                        <th>
                            Email
                        </th>

                        <th>
                            Pesan
                        </th>

                        <th>
                            Tanggal
                        </th>

                        <th style="text-align: center;">
                            Aksi
                        </th>

                    </tr>

                </thead>


                <tbody>

                    @foreach($messages as $index => $message)

                        <tr>

                            <td class="message-number">
                                {{ $index + 1 }}
                            </td>

                            <td class="message-name">
                                {{ $message->name }}
                            </td>

                            <td class="message-email">
                                {{ $message->email ?: '-' }}
                            </td>

                            <td class="message-content">
                                {{ $message->message }}
                            </td>

                            <td class="message-date">
                                {{ $message->created_at->format('d/m/Y') }}
                            </td>

                            <td>

                                <div class="message-actions">

                                    <form
                                        action="{{ route('admin.messages.destroy', $message) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus pesan ini?')"
                                    >

                                        @csrf

                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="message-action delete"
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

        </div>


        {{-- =================================================
             TOTAL DATA
        ================================================== --}}

        <div class="message-footer">

            <div class="message-total">

                Total
                {{ $messages->count() }}
                pesan

            </div>

        </div>


    @else

        <div class="message-empty">

            Belum ada pesan dari pengunjung.

        </div>

    @endif


</div>

@endsection