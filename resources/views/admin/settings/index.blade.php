@extends('layouts.admin')

@section('title', 'Pengaturan')

@section('content')

<style>

    /* =========================================================
       PAGE
    ========================================================= */

    .settings-page {
        width: 100%;
        max-width: 930px;
        margin: 0 auto;
    }


    /* =========================================================
       HEADER
    ========================================================= */

    .settings-header {
        margin-bottom: 32px;
    }

    .settings-header h1 {
        margin: 0 0 10px;

        color: #123d91;

        font-size: 30px;
        font-weight: 700;

        line-height: 1.15;
    }

    .settings-breadcrumb {
        display: flex;
        align-items: center;

        gap: 6px;

        font-size: 17px;
        font-weight: 600;

        line-height: 1.2;
    }

    .settings-breadcrumb .home {
        color: #0759d1;
    }

    .settings-breadcrumb .separator,
    .settings-breadcrumb .current {
        color: #999999;
    }


    /* =========================================================
       SUCCESS MESSAGE
    ========================================================= */

    .settings-success {
        margin-bottom: 16px;

        padding: 10px 13px;

        background: #def2e8;
        color: #238653;

        border-radius: 6px;

        font-size: 13px;
        font-weight: 600;
    }


    /* =========================================================
       TABS
    ========================================================= */

    .settings-tabs {
        width: 100%;

        display: grid;
        grid-template-columns: repeat(4, 1fr);

        align-items: end;

        height: 40px;

        margin-bottom: 0;

        position: relative;

        border-bottom: 1px solid #dce8f8;
    }

    .settings-tab {
        height: 40px;

        display: flex;
        align-items: center;
        justify-content: center;

        padding: 0 8px;

        border: none;
        border-radius: 7px 7px 0 0;

        background: transparent;

        color: #929292;

        font-family: inherit;

        font-size: 16px;
        font-weight: 600;

        line-height: 1;

        cursor: pointer;

        transition:
            color .2s ease,
            background .2s ease;
    }

    .settings-tab:hover {
        color: #0e57d8;
    }

    .settings-tab.active {
        background: #eaf2ff;
        color: #0759d1;
    }


    /*
       Highlight lama tidak dipakai.
       Tetap ada supaya struktur JS tidak rusak.
    */

    .settings-tab-highlight {
        display: none;
    }


    /* =========================================================
       CONTENT CARD
    ========================================================= */

    .settings-card {
        width: 100%;

        background: #ffffff;

        border: 1px solid #dce8f8;

        border-radius: 0 7px 7px 7px;

        padding: 24px 24px 26px;

        min-height: 450px;
    }


    /* =========================================================
       PANEL
    ========================================================= */

    .settings-panel {
        display: none;
    }

    .settings-panel.active {
        display: block;
    }


    /* =========================================================
       PANEL TITLE
    ========================================================= */

    .settings-panel-title {
        margin: 0 0 16px;

        color: #111111;

        font-size: 20px;
        font-weight: 700;

        line-height: 1.2;
    }

    .settings-panel-description {
        margin: -7px 0 20px;

        color: #888888;

        font-size: 13px;
        font-weight: 400;

        line-height: 1.5;
    }


    /* =========================================================
       FORM GROUP
    ========================================================= */

    .settings-form-group {
        margin-bottom: 17px;
    }

    .settings-form-group:last-child {
        margin-bottom: 0;
    }


    /* =========================================================
       FORM ROW
    ========================================================= */

    .settings-form-row {
        display: grid;

        grid-template-columns: 1fr 1fr;

        gap: 18px;

        margin-bottom: 17px;
    }

    .settings-form-row .settings-form-group {
        margin-bottom: 0;
    }


    /* =========================================================
       LABEL
    ========================================================= */

    .settings-label {
        display: block;

        margin-bottom: 6px;

        color: #111111;

        font-size: 15px;
        font-weight: 700;

        line-height: 1.2;
    }


    /* =========================================================
       INPUT
    ========================================================= */

    .settings-input,
    .settings-textarea,
    .settings-select {
        width: 100%;

        border: 1px solid #dddddd;

        border-radius: 6px;

        background: #ffffff;

        color: #222222;

        font-family: inherit;

        font-size: 14px;
        font-weight: 500;

        outline: none;

        transition:
            border-color .15s ease,
            box-shadow .15s ease;
    }

    .settings-input {
        height: 42px;

        padding: 0 12px;
    }

    .settings-textarea {
        min-height: 120px;

        padding: 10px 12px;

        resize: vertical;

        line-height: 1.45;
    }

    .settings-input::placeholder,
    .settings-textarea::placeholder {
        color: #999999;
    }

    .settings-input:focus,
    .settings-textarea:focus,
    .settings-select:focus {
        border-color: #0e57d8;

        box-shadow: 0 0 0 3px rgba(14, 87, 216, .08);
    }


    /* =========================================================
       IMAGE SECTION
    ========================================================= */

    .settings-image-section {
        width: 100%;
    }

    .settings-image-preview {
        width: 100%;

        display: flex;
        align-items: center;
        justify-content: center;

        overflow: hidden;

        background: #f4f7fb;

        border: 1px solid #dddddd;

        border-radius: 6px;

        color: #999999;

        font-size: 13px;
    }

    .settings-image-preview img {
        display: block;

        width: 100%;
        height: 100%;

        object-fit: cover;
    }


    /* =========================================================
       SCHOOL IMAGE
    ========================================================= */

    .school-image-preview {
        height: 180px;

        margin-bottom: 10px;
    }


    /* =========================================================
       BANNER IMAGE
    ========================================================= */

    .banner-image-preview {
        height: 240px;

        margin-bottom: 10px;
    }


    /* =========================================================
       PRINCIPAL IMAGE
    ========================================================= */

    .principal-image-preview {
        width: 240px;
        height: 190px;

        flex-shrink: 0;
    }


    /* =========================================================
       IMAGE + INPUT
    ========================================================= */

    .settings-image-input-row {
        display: flex;
        align-items: center;

        gap: 10px;
    }

    .settings-file-input {
        font-family: inherit;

        font-size: 13px;

        color: #555555;
    }

    .settings-image-help {
        margin-top: 5px;

        color: #999999;

        font-size: 11px;

        line-height: 1.4;
    }


    /* =========================================================
       IMAGE BUTTON
    ========================================================= */

    .settings-image-button {
        height: 37px;

        display: inline-flex;
        align-items: center;
        justify-content: center;

        padding: 0 14px;

        background: #0e57d8;
        color: #ffffff;

        border: none;
        border-radius: 6px;

        font-family: inherit;

        font-size: 14px;
        font-weight: 700;

        cursor: pointer;

        white-space: nowrap;

        transition: background .15s ease;
    }

    .settings-image-button:hover {
        background: #0848b8;
    }


    /* =========================================================
       PRINCIPAL TOP SECTION
    ========================================================= */

    .principal-top {
        display: flex;
        align-items: flex-start;

        gap: 22px;

        margin-bottom: 18px;
    }

    .principal-info {
        flex: 1;

        min-width: 0;
    }

    .principal-info .settings-form-group {
        margin-bottom: 15px;
    }

    .principal-info .settings-form-group:last-child {
        margin-bottom: 0;
    }


    /* =========================================================
       PRINCIPAL IMAGE INPUT
    ========================================================= */

    .principal-image-input {
        margin-top: 8px;
    }


    /* =========================================================
       FILE INPUT
    ========================================================= */

    input[type="file"] {
        max-width: 100%;

        font-family: inherit;

        font-size: 13px;
    }

    input[type="file"]::file-selector-button {
        height: 36px;

        margin-right: 8px;

        padding: 0 13px;

        border: none;
        border-radius: 6px;

        background: #0e57d8;
        color: #ffffff;

        font-family: inherit;

        font-size: 13px;
        font-weight: 600;

        cursor: pointer;
    }


    /* =========================================================
       SAVE FOOTER
    ========================================================= */

    .settings-form-footer {
        display: flex;
        justify-content: flex-end;
        align-items: center;

        margin-top: 24px;
        padding-top: 18px;

        border-top: 1px solid #e5eaf2;
    }

    .settings-save-button {
        min-width: 175px;
        height: 40px;

        display: inline-flex;
        align-items: center;
        justify-content: center;

        gap: 7px;

        padding: 0 16px;

        background: #0e57d8;
        color: #ffffff;

        border: none;
        border-radius: 6px;

        font-family: inherit;

        font-size: 14px;
        font-weight: 700;

        cursor: pointer;

        transition: background .15s ease;
    }

    .settings-save-button:hover {
        background: #0848b8;
    }

    .settings-save-button i {
        font-size: 13px;
    }


    /* =========================================================
       BANNER FORM
    ========================================================= */

    .banner-fields {
        display: grid;

        grid-template-columns: 1fr 1fr;

        gap: 22px;

        margin-top: 22px;
    }

    .banner-fields .settings-form-group {
        margin-bottom: 0;
    }

    .banner-description-input {
        min-height: 70px;
    }


    /* =========================================================
       ABOUT FORM
    ========================================================= */

    .about-section {
        margin-bottom: 18px;
    }

    .about-section:last-child {
        margin-bottom: 0;
    }

    .about-textarea {
        min-height: 155px;
    }

    .history-textarea {
        min-height: 190px;
    }


    /* =========================================================
       PROFILE FORM
    ========================================================= */

    .profile-grid {
        display: grid;

        grid-template-columns: 1fr 1fr;

        column-gap: 38px;

        align-items: start;
    }

    .profile-grid .settings-form-group {
        margin-bottom: 20px;
    }


    /* =========================================================
       SELECT
    ========================================================= */

    .settings-select {
        height: 42px;

        padding: 0 12px;

        appearance: auto;
    }


    /* =========================================================
       RESPONSIVE
    ========================================================= */

    @media (max-width: 1000px) {

        .settings-page {
            max-width: 100%;
        }

        .settings-header h1 {
            font-size: 28px;
        }

        .settings-breadcrumb {
            font-size: 16px;
        }

        .settings-tab {
            font-size: 15px;
        }

        .settings-card {
            padding: 22px;
        }

        .profile-grid {
            column-gap: 25px;
        }

        .banner-fields {
            gap: 18px;
        }
    }


    @media (max-width: 750px) {

        .settings-header {
            margin-bottom: 24px;
        }

        .settings-header h1 {
            font-size: 26px;
        }

        .settings-breadcrumb {
            font-size: 15px;
        }

        .settings-tabs {
            height: auto;

            grid-template-columns: repeat(2, 1fr);
        }

        .settings-tab {
            min-height: 42px;

            font-size: 14px;
        }

        .settings-card {
            border-radius: 0 0 7px 7px;

            padding: 18px;
        }

        .profile-grid,
        .settings-form-row,
        .banner-fields {
            grid-template-columns: 1fr;
        }

        .principal-top {
            flex-direction: column;
        }

        .principal-image-preview {
            width: 100%;
            height: 200px;
        }

        .settings-save-button {
            width: 100%;
        }

        .settings-form-footer {
            justify-content: stretch;
        }
    }


    @media (max-width: 480px) {

        .settings-card {
            padding: 16px;
        }

        .settings-tab {
            font-size: 13px;
        }

        .settings-label {
            font-size: 14px;
        }

        .settings-input,
        .settings-textarea,
        .settings-select {
            font-size: 14px;
        }
    }

</style>


<div class="settings-page">


    {{-- =====================================================
         HEADER
    ====================================================== --}}

    <div class="settings-header">

        <h1>
            Pengaturan
        </h1>

        <div class="settings-breadcrumb">

            <span class="home">
                Dashboard
            </span>

            <span class="separator">
                /
            </span>

            <span class="current">
                Pengaturan
            </span>

        </div>

    </div>


    {{-- =====================================================
         SUCCESS
    ====================================================== --}}

    @if(session('success'))

        <div class="settings-success">
            {{ session('success') }}
        </div>

    @endif


    {{-- =====================================================
         TABS
    ====================================================== --}}

    <div class="settings-tabs">

        <div class="settings-tab-highlight"></div>

        <button
            type="button"
            class="settings-tab active"
            data-tab="profil"
            data-index="0"
        >
            Profil Sekolah
        </button>

        <button
            type="button"
            class="settings-tab"
            data-tab="banner"
            data-index="1"
        >
            Banner Home
        </button>

        <button
            type="button"
            class="settings-tab"
            data-tab="sambutan"
            data-index="2"
        >
            Sambutan
        </button>

        <button
            type="button"
            class="settings-tab"
            data-tab="tentang"
            data-index="3"
        >
            Tentang Sekolah
        </button>

    </div>


    {{-- =====================================================
         CARD
    ====================================================== --}}

    <div class="settings-card">


        {{-- =================================================
             PROFIL SEKOLAH
        ================================================== --}}

        <div
            class="settings-panel active"
            data-panel="profil"
        >

            <h2 class="settings-panel-title">
                Profil Sekolah
            </h2>


            <form
                action="{{ route('admin.settings.update') }}"
                method="POST"
            >

                @csrf
                @method('PUT')


                <div class="profile-grid">


                    {{-- LEFT --}}

                    <div>

                        <div class="settings-form-group">

                            <label
                                for="school_name"
                                class="settings-label"
                            >
                                Nama Sekolah
                            </label>

                            <input
                                type="text"
                                id="school_name"
                                name="school_name"
                                class="settings-input"
                                value="{{ old('school_name', $setting?->school_name) }}"
                                placeholder="Masukkan nama sekolah"
                            >

                        </div>


                        <div class="settings-form-group">

                            <label
                                for="npsn"
                                class="settings-label"
                            >
                                NPSN
                            </label>

                            <input
                                type="text"
                                id="npsn"
                                name="npsn"
                                class="settings-input"
                                value="{{ old('npsn', $setting?->npsn) }}"
                                placeholder="Masukkan NPSN"
                            >

                        </div>


                        <div class="settings-form-group">

                            <label
                                for="accreditation"
                                class="settings-label"
                            >
                                Akreditasi
                            </label>

                            <select
                                id="accreditation"
                                name="accreditation"
                                class="settings-select"
                            >

                                <option value="">
                                    Pilih Akreditasi
                                </option>

                                <option
                                    value="A"
                                    {{ old('accreditation', $setting?->accreditation) == 'A' ? 'selected' : '' }}
                                >
                                    A
                                </option>

                                <option
                                    value="B"
                                    {{ old('accreditation', $setting?->accreditation) == 'B' ? 'selected' : '' }}
                                >
                                    B
                                </option>

                                <option
                                    value="C"
                                    {{ old('accreditation', $setting?->accreditation) == 'C' ? 'selected' : '' }}
                                >
                                    C
                                </option>

                            </select>

                        </div>


                        <div class="settings-form-group">

                            <label
                                for="founded_year"
                                class="settings-label"
                            >
                                Tahun Berdiri
                            </label>

                            <input
                                type="number"
                                id="founded_year"
                                name="founded_year"
                                class="settings-input"
                                value="{{ old('founded_year', $setting?->founded_year) }}"
                                placeholder="Contoh: 2000"
                            >

                        </div>

                    </div>


                    {{-- RIGHT --}}

                    <div>

                        <div class="settings-form-group">

                            <label
                                for="motto"
                                class="settings-label"
                            >
                                Motto
                            </label>

                            <textarea
                                id="motto"
                                name="motto"
                                class="settings-textarea"
                                style="min-height: 80px;"
                                placeholder="Masukkan motto sekolah"
                            >{{ old('motto', $setting?->motto) }}</textarea>

                        </div>

                        <div class="settings-form-group">

    <label
        for="student_count"
        class="settings-label"
    >
        Jumlah Siswa Aktif
    </label>

    <input
        type="text"
        id="student_count"
        name="student_count"
        class="settings-input"
        value="{{ old('student_count', $setting?->student_count) }}"
        placeholder="Contoh: 1.066+"
    >

</div>


<div class="settings-form-group">

    <label
        for="teacher_count"
        class="settings-label"
    >
        Guru & Tenaga Pendidik
    </label>

    <input
        type="text"
        id="teacher_count"
        name="teacher_count"
        class="settings-input"
        value="{{ old('teacher_count', $setting?->teacher_count) }}"
        placeholder="Contoh: 60+"
    >

</div>


                        <div class="settings-form-group">

                            <label
                                for="short_description"
                                class="settings-label"
                            >
                                Deskripsi Singkat
                            </label>

                            <textarea
                                id="short_description"
                                name="short_description"
                                class="settings-textarea"
                                style="min-height: 110px;"
                                placeholder="Masukkan deskripsi singkat sekolah"
                            >{{ old('short_description', $setting?->short_description) }}</textarea>

                        </div>

                    </div>

                </div>


                <div class="settings-form-footer">

                    <button
                        type="submit"
                        class="settings-save-button"
                    >
                        <i class="fa-solid fa-floppy-disk"></i>

                        Simpan Perubahan
                    </button>

                </div>

            </form>

        </div>


        {{-- =================================================
             BANNER HOME
        ================================================== --}}

        <div
            class="settings-panel"
            data-panel="banner"
        >

            <h2 class="settings-panel-title">
                Gambar Banner
            </h2>


            <form
                action="{{ route('admin.settings.update') }}"
                method="POST"
                enctype="multipart/form-data"
            >

                @csrf
                @method('PUT')


                <div class="settings-image-section">

                    <div class="banner-image-preview settings-image-preview">

                        @if($setting?->banner_image)

                            <img
                                src="{{ asset('storage/' . $setting->banner_image) }}"
                                alt="Banner"
                            >

                        @else

                            Belum ada gambar banner

                        @endif

                    </div>


                    <div class="settings-image-input-row">

                        <input
                            type="file"
                            name="banner_image"
                            id="banner_image"
                            accept="image/*"
                        >

                    </div>


                    <div class="settings-image-help">
                        JPG, JPEG, PNG, atau WEBP. Maksimal 2 MB.
                    </div>

                </div>


                <div class="banner-fields">

                    <div class="settings-form-group">

                        <label
                            for="banner_title"
                            class="settings-label"
                        >
                            Judul
                        </label>

                        <input
                            type="text"
                            id="banner_title"
                            name="banner_title"
                            class="settings-input"
                            value="{{ old('banner_title', $setting?->banner_title) }}"
                            placeholder="Masukkan judul banner"
                        >

                    </div>


                    <div class="settings-form-group">

                        <label
                            for="banner_description"
                            class="settings-label"
                        >
                            Deskripsi Singkat
                        </label>

                        <textarea
                            id="banner_description"
                            name="banner_description"
                            class="settings-textarea banner-description-input"
                            placeholder="Masukkan deskripsi banner"
                        >{{ old('banner_description', $setting?->banner_description) }}</textarea>

                    </div>

                </div>


                <div class="settings-form-footer">

                    <button
                        type="submit"
                        class="settings-save-button"
                    >
                        <i class="fa-solid fa-floppy-disk"></i>

                        Simpan Perubahan
                    </button>

                </div>

            </form>

        </div>


        {{-- =================================================
             SAMBUTAN
        ================================================== --}}

        <div
            class="settings-panel"
            data-panel="sambutan"
        >

            <h2 class="settings-panel-title">
                Foto Kepala Sekolah
            </h2>


            <form
                action="{{ route('admin.settings.update') }}"
                method="POST"
                enctype="multipart/form-data"
            >

                @csrf
                @method('PUT')


                <div class="principal-top">


                    {{-- FOTO --}}

                    <div>

                        <div class="principal-image-preview settings-image-preview">

                            @if($setting?->principal_image)

                                <img
                                    src="{{ asset('storage/' . $setting->principal_image) }}"
                                    alt="Kepala Sekolah"
                                >

                            @else

                                Belum ada foto

                            @endif

                        </div>


                        <div class="principal-image-input">

                            <input
                                type="file"
                                name="principal_image"
                                id="principal_image"
                                accept="image/*"
                            >

                            <div class="settings-image-help">
                                JPG, JPEG, PNG, atau WEBP. Maksimal 2 MB.
                            </div>

                        </div>

                    </div>


                    {{-- DATA KEPALA SEKOLAH --}}

                    <div class="principal-info">

                        <div class="settings-form-group">

                            <label
                                for="principal_name"
                                class="settings-label"
                            >
                                Nama
                            </label>

                            <input
                                type="text"
                                id="principal_name"
                                name="principal_name"
                                class="settings-input"
                                value="{{ old('principal_name', $setting?->principal_name) }}"
                                placeholder="Masukkan nama kepala sekolah"
                            >

                        </div>


                        <div class="settings-form-group">

                            <label
                                for="principal_position"
                                class="settings-label"
                            >
                                Jabatan
                            </label>

                            <input
                                type="text"
                                id="principal_position"
                                name="principal_position"
                                class="settings-input"
                                value="{{ old('principal_position', $setting?->principal_position) }}"
                                placeholder="Contoh: Kepala Sekolah"
                            >

                        </div>

                    </div>

                </div>


                <div class="settings-form-group">

                    <label
                        for="greeting"
                        class="settings-label"
                    >
                        Sambutan
                    </label>

                    <textarea
                        id="greeting"
                        name="greeting"
                        class="settings-textarea"
                        style="min-height: 210px;"
                        placeholder="Masukkan isi sambutan kepala sekolah"
                    >{{ old('greeting', $setting?->greeting) }}</textarea>

                </div>


                <div class="settings-form-footer">

                    <button
                        type="submit"
                        class="settings-save-button"
                    >
                        <i class="fa-solid fa-floppy-disk"></i>

                        Simpan Perubahan
                    </button>

                </div>

            </form>

        </div>


        {{-- =================================================
             TENTANG SEKOLAH
        ================================================== --}}

        <div
            class="settings-panel"
            data-panel="tentang"
        >

            <h2 class="settings-panel-title">
                Foto Sekolah
            </h2>


            <form
                action="{{ route('admin.settings.update') }}"
                method="POST"
                enctype="multipart/form-data"
            >

                @csrf
                @method('PUT')


                {{-- FOTO SEKOLAH --}}

                <div class="about-section">

                    <div class="school-image-preview settings-image-preview">

                        @if($setting?->school_image)

                            <img
                                src="{{ asset('storage/' . $setting->school_image) }}"
                                alt="Foto Sekolah"
                            >

                        @else

                            Belum ada foto sekolah

                        @endif

                    </div>


                    <input
                        type="file"
                        name="school_image"
                        id="school_image"
                        accept="image/*"
                    >

                    <div class="settings-image-help">
                        JPG, JPEG, PNG, atau WEBP. Maksimal 2 MB.
                    </div>

                </div>


                {{-- DESKRIPSI --}}

                <div class="about-section">

                    <label
                        for="about_description"
                        class="settings-label"
                    >
                        Deskripsi
                    </label>

                    <textarea
                        id="about_description"
                        name="about_description"
                        class="settings-textarea about-textarea"
                        placeholder="Masukkan deskripsi sekolah"
                    >{{ old('about_description', $setting?->about_description) }}</textarea>

                </div>


                {{-- SEJARAH --}}

                <div class="about-section">

                    <label
                        for="school_history"
                        class="settings-label"
                    >
                        Sejarah Sekolah
                    </label>

                    <textarea
                        id="school_history"
                        name="school_history"
                        class="settings-textarea history-textarea"
                        placeholder="Masukkan sejarah sekolah"
                    >{{ old('school_history', $setting?->school_history) }}</textarea>

                </div>


                <div class="settings-form-footer">

                    <button
                        type="submit"
                        class="settings-save-button"
                    >
                        <i class="fa-solid fa-floppy-disk"></i>

                        Simpan Perubahan
                    </button>

                </div>

            </form>

        </div>


    </div>

</div>


@push('scripts')

<script>

document.addEventListener('DOMContentLoaded', function () {

    const tabs =
        document.querySelectorAll('.settings-tab');

    const panels =
        document.querySelectorAll('.settings-panel');

    const highlight =
        document.querySelector('.settings-tab-highlight');


    if (!tabs.length || !panels.length) {
        return;
    }


    function activateTab(tab) {

        const target =
            tab.dataset.tab;


        /*
         * Tab aktif
         */

        tabs.forEach(function (item) {

            item.classList.remove('active');

        });

        tab.classList.add('active');


        /*
         * Panel aktif
         */

        panels.forEach(function (panel) {

            panel.classList.remove('active');


            if (
                panel.dataset.panel === target
            ) {

                panel.classList.add('active');

            }

        });


        /*
         * Simpan tab terakhir
         */

        localStorage.setItem(
            'admin_settings_tab',
            target
        );

    }


    /*
     * Klik tab
     */

    tabs.forEach(function (tab) {

        tab.addEventListener(
            'click',
            function () {

                activateTab(tab);

            }
        );

    });


    /*
     * Ambil tab terakhir
     */

    const savedTab =
        localStorage.getItem(
            'admin_settings_tab'
        );


    if (savedTab) {

        const savedButton =
            document.querySelector(
                `.settings-tab[data-tab="${savedTab}"]`
            );


        if (savedButton) {

            activateTab(savedButton);

            return;

        }

    }


    /*
     * Default Profil Sekolah
     */

    const defaultTab =
        document.querySelector(
            '.settings-tab[data-tab="profil"]'
        );


    if (defaultTab) {

        activateTab(defaultTab);

    }

});

</script>

@endpush

@endsection