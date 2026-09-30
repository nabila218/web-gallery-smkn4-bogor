@extends('layouts.admin')

@section('title', 'Kontak')

@section('content')

<style>
    /* ================================
       PAGE
    ================================ */

    .contact-page {
        width: 100%;
        max-width: 930px;
        margin: 0 auto;
    }


    /* ================================
       HEADER
    ================================ */

    .contact-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;

        margin-bottom: 24px;
    }

    .contact-header-left h1 {
        margin: 0 0 10px;

        color: #123d91;

        font-size: 26px;
        font-weight: 700;
        line-height: 1.2;
    }

    .contact-breadcrumb {
        display: flex;
        align-items: center;

        gap: 6px;

        font-size: 14px;
        font-weight: 600;
    }

    .contact-breadcrumb .home {
        color: #0759d1;
        text-decoration: none;
        cursor: pointer;
    }

    .contact-breadcrumb .home:hover {
        text-decoration: underline;
    }

    .contact-breadcrumb .separator,
    .contact-breadcrumb .current {
        color: #999;
    }


    /* ================================
       BUTTON EDIT
    ================================ */

    .btn-edit-contact {
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

    .btn-edit-contact:hover {
        background: #0848b8;
    }

    .btn-edit-contact i {
        font-size: 13px;
    }


    /* ================================
       SUCCESS
    ================================ */

    .contact-success {
        margin-bottom: 18px;

        padding: 10px 13px;

        background: #def2e8;
        color: #238653;

        border-radius: 7px;

        font-size: 13px;
        font-weight: 600;
    }


    /* ================================
       CONTACT CONTENT
    ================================ */

    .contact-form {
        width: 100%;
    }

    .contact-row {
        display: grid;

        grid-template-columns: 1fr 1fr;

        gap: 18px;

        margin-bottom: 16px;
    }

    .contact-field {
        width: 100%;
    }

    .contact-field.full {
        grid-column: 1 / -1;
    }


    /* ================================
       LABEL
    ================================ */

    .contact-label {
        display: block;

        margin-bottom: 7px;

        color: #222;

        font-size: 14px;
        font-weight: 700;
    }


    /* ================================
       VALUE
    ================================ */

    .contact-value {
        width: 100%;

        min-height: 42px;

        display: flex;
        align-items: center;

        padding: 9px 12px;

        background: white;

        border: 1px solid #d8d8d8;

        border-radius: 7px;

        color: #777;

        font-size: 14px;
        font-weight: 600;

        line-height: 1.4;

        word-break: break-word;
    }

    .contact-value.address {
        min-height: 68px;

        align-items: flex-start;

        padding-top: 10px;
    }

    .contact-value.maps {
        font-size: 13px;
    }


    /* ================================
       JAM OPERASIONAL
    ================================ */

    .operational-row {
        display: grid;

        grid-template-columns:
            1fr
            105px
            20px
            105px
            35px;

        gap: 8px;

        align-items: end;
    }

    .operational-separator {
        height: 42px;

        display: flex;
        align-items: center;
        justify-content: center;

        color: #999;

        font-size: 17px;
        font-weight: 600;
    }

    .operational-zone {
        height: 42px;

        display: flex;
        align-items: center;

        color: #888;

        font-size: 14px;
        font-weight: 600;
    }


    /* ================================
       MEDIA SOSIAL
    ================================ */

    .social-title {
        margin-top: 23px;
        margin-bottom: 9px;

        color: #222;

        font-size: 15px;
        font-weight: 700;
    }

    .social-box {
        width: 100%;

        padding: 17px 16px;

        background: #eaf2ff;

        border: 1px solid #dbe7f7;

        border-radius: 7px;
    }

    .social-row {
        display: grid;

        grid-template-columns: 1fr 1fr;

        gap: 16px;
    }

    .social-row + .social-row {
        margin-top: 14px;
    }

    .social-field {
        width: 100%;
    }

    .social-label {
        display: block;

        margin-bottom: 7px;

        color: #222;

        font-size: 14px;
        font-weight: 700;
    }

    .social-value {
        width: 100%;

        min-height: 42px;

        display: flex;
        align-items: center;

        padding: 9px 12px;

        background: white;

        border: 1px solid #d8d8d8;

        border-radius: 7px;

        color: #777;

        font-size: 14px;
        font-weight: 600;

        word-break: break-word;
    }


    /* ================================
       EMPTY
    ================================ */

    .contact-empty {
        padding: 45px 20px;

        background: white;

        border: 1px solid #dbe7f7;

        border-radius: 8px;

        text-align: center;

        color: #888;

        font-size: 14px;
    }

    .contact-empty p {
        margin: 0 0 18px;
    }


    /* ================================
       RESPONSIVE
    ================================ */

    @media (max-width: 800px) {

        .contact-page {
            max-width: 100%;
        }

        .contact-header {
            flex-direction: column;

            gap: 16px;
        }

        .contact-row,
        .social-row {
            grid-template-columns: 1fr;

            gap: 14px;
        }

        .contact-field.full {
            grid-column: auto;
        }

        .operational-row {
            grid-template-columns: 1fr;
        }

        .operational-separator,
        .operational-zone {
            display: none;
        }

        .btn-edit-contact {
            width: 100%;
        }
    }
</style>


<div class="contact-page">

    {{-- ================================
         HEADER
    ================================= --}}

    <div class="contact-header">

        <div class="contact-header-left">

            <h1>
                Kontak
            </h1>

            <div class="contact-breadcrumb">

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
                    Kontak
                </span>

            </div>

        </div>


        <a
            href="{{ route('admin.contacts.edit') }}"
            class="btn-edit-contact"
        >
            <i class="fa-solid fa-pen-to-square"></i>
            Edit Kontak
        </a>

    </div>


    {{-- ================================
         SUCCESS
    ================================= --}}

    @if(session('success'))

        <div class="contact-success">
            {{ session('success') }}
        </div>

    @endif


    {{-- ================================
         DATA KONTAK
    ================================= --}}

    @if($contact)

        <div class="contact-form">


            {{-- ================================
                 ALAMAT
            ================================= --}}

            <div class="contact-row">

                <div class="contact-field full">

                    <label class="contact-label">
                        Alamat
                    </label>

                    <div class="contact-value address">
                        {{ $contact->address ?? '-' }}
                    </div>

                </div>

            </div>


            {{-- ================================
                 TELEPON + EMAIL
            ================================= --}}

            <div class="contact-row">

                <div class="contact-field">

                    <label class="contact-label">
                        No. Telepon
                    </label>

                    <div class="contact-value">
                        {{ $contact->phone ?? '-' }}
                    </div>

                </div>


                <div class="contact-field">

                    <label class="contact-label">
                        Email
                    </label>

                    <div class="contact-value">
                        {{ $contact->email ?? '-' }}
                    </div>

                </div>

            </div>


            {{-- ================================
                 WHATSAPP + GOOGLE MAPS
            ================================= --}}

            <div class="contact-row">

                <div class="contact-field">

                    <label class="contact-label">
                        WhatsApp
                    </label>

                    <div class="contact-value">
                        {{ $contact->whatsapp ?? '-' }}
                    </div>

                </div>


                <div class="contact-field">

                    <label class="contact-label">
                        Google Maps
                    </label>

                    <div class="contact-value maps">
                        {{ $contact->google_maps ?? '-' }}
                    </div>

                </div>

            </div>


            {{-- ================================
                 JAM OPERASIONAL
            ================================= --}}

            <div class="contact-field">

                <label class="contact-label">
                    Jam Operasional
                </label>


                <div class="operational-row">

                    {{-- HARI --}}

                    <div class="contact-value">
                        {{ $contact->operational_days ?? '-' }}
                    </div>


                    {{-- JAM BUKA --}}

                    <div class="contact-value">
                        {{ $contact->opening_time ?? '-' }}
                    </div>


                    {{-- PEMISAH --}}

                    <div class="operational-separator">
                        -
                    </div>


                    {{-- JAM TUTUP --}}

                    <div class="contact-value">
                        {{ $contact->closing_time ?? '-' }}
                    </div>


                    {{-- ZONA WAKTU --}}

                    <div class="operational-zone">
                        WIB
                    </div>

                </div>

            </div>


            {{-- ================================
                 MEDIA SOSIAL
            ================================= --}}

            <div class="social-title">
                Media Sosial
            </div>


            <div class="social-box">


                {{-- ROW 1 --}}

                <div class="social-row">

                    <div class="social-field">

                        <label class="social-label">
                            Twitter
                        </label>

                        <div class="social-value">
                            {{ $contact->twitter ?? '-' }}
                        </div>

                    </div>


                    <div class="social-field">

                        <label class="social-label">
                            Instagram
                        </label>

                        <div class="social-value">
                            {{ $contact->instagram ?? '-' }}
                        </div>

                    </div>

                </div>


                {{-- ROW 2 --}}

                <div class="social-row">

                    <div class="social-field">

                        <label class="social-label">
                            Facebook
                        </label>

                        <div class="social-value">
                            {{ $contact->facebook ?? '-' }}
                        </div>

                    </div>


                    <div class="social-field">

                        <label class="social-label">
                            YouTube
                        </label>

                        <div class="social-value">
                            {{ $contact->youtube ?? '-' }}
                        </div>

                    </div>

                </div>

            </div>

        </div>


    @else


        {{-- ================================
             EMPTY
        ================================= --}}

        <div class="contact-empty">

            <p>
                Data kontak belum tersedia.
            </p>

            <a
                href="{{ route('admin.contacts.edit') }}"
                class="btn-edit-contact"
            >
                <i class="fa-solid fa-plus"></i>
                Tambah Data Kontak
            </a>

        </div>


    @endif

</div>

@endsection