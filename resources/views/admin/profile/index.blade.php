@extends('layouts.admin')

@section('title', 'Profil Saya')

@section('content')

<style>
    .profile-page {
        width: 100%;
        max-width: 1000px;
        margin: 0 auto;
    }

    .profile-header {
        margin-bottom: 24px;
    }

    .profile-title {
        margin: 0 0 8px;
        color: #123d91;
        font-size: 27px;
        font-weight: 700;
        line-height: 1.2;
    }

    .profile-breadcrumb {
        display: flex;
        align-items: center;
        gap: 7px;
        font-size: 15px;
        font-weight: 600;
    }

    .profile-breadcrumb a {
        color: #0759d1;
        text-decoration: none;
    }

    .profile-breadcrumb a:hover {
        text-decoration: underline;
    }

    .profile-breadcrumb span {
        color: #999;
    }

    .profile-card {
        width: 100%;
        background: #fff;
        border: 1.5px solid #b7b7b7;
        border-radius: 8px;
        padding: 25px;
        display: grid;
        grid-template-columns: 220px 1fr;
        gap: 25px;
        box-sizing: border-box;
    }

    .profile-left {
        border-right: 1.5px solid #e5e5e5;
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 5px 25px 5px 5px;
    }

    .profile-avatar {
        width: 110px;
        height: 110px;
        border-radius: 50%;
        background: #e5efff;
        color: #0759d1;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        margin-bottom: 18px;
    }

    .profile-avatar i {
        font-size: 58px;
    }

    .profile-avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .change-photo-btn {
        height: 38px;
        padding: 0 16px;
        border: 1px solid #0759d1;
        border-radius: 7px;
        background: #fff;
        color: #0759d1;
        font-size: 13px;
        font-weight: 600;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        box-sizing: border-box;
    }

    .change-photo-btn:hover {
        background: #f0f6ff;
    }

    .profile-right {
        display: flex;
        flex-direction: column;
        min-width: 0;
    }

    .profile-field {
        margin-bottom: 15px;
    }

    .profile-label {
        display: block;
        margin-bottom: 6px;
        color: #111;
        font-size: 14px;
        font-weight: 700;
    }

    .profile-value {
        width: 100%;
        min-height: 40px;
        padding: 9px 12px;
        box-sizing: border-box;
        border: 1.5px solid #e1e1e1;
        border-radius: 7px;
        background: #fafafa;
        color: #555;
        font-size: 14px;
        font-weight: 500;
        display: flex;
        align-items: center;
    }

    .profile-edit-action {
        display: flex;
        justify-content: flex-end;
        margin-top: 18px;
    }

    .btn-primary {
        min-width: 110px;
        height: 40px;
        padding: 0 17px;
        border: 1px solid #0759d1;
        border-radius: 7px;
        background: #0759d1;
        color: #fff;
        text-decoration: none;
        font-size: 14px;
        font-weight: 700;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
    }

    .btn-primary:hover {
        background: #0649ad;
    }

    .success-alert {
        position: fixed;
        top: 25px;
        right: 25px;
        width: 320px;
        background: #edf9f3;
        border: 1px solid #b9e5cd;
        border-bottom: 3px solid #4bae7c;
        border-radius: 8px;
        padding: 15px;
        display: flex;
        align-items: flex-start;
        gap: 10px;
        box-shadow: 0 3px 8px rgba(0,0,0,.08);
        z-index: 1000;
    }

    .success-icon {
        width: 25px;
        height: 25px;
        flex-shrink: 0;
        border-radius: 50%;
        background: #4bae7c;
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 13px;
    }

    .success-text {
        flex: 1;
    }

    .success-title {
        margin: 0 0 3px;
        color: #111;
        font-size: 15px;
        font-weight: 700;
    }

    .success-message {
        margin: 0;
        color: #777;
        font-size: 12px;
    }

    .success-close {
        border: 0;
        background: transparent;
        color: #888;
        font-size: 19px;
        cursor: pointer;
        line-height: 1;
    }

    @media (max-width: 700px) {
        .profile-card {
            grid-template-columns: 1fr;
        }

        .profile-left {
            border-right: none;
            border-bottom: 1.5px solid #e5e5e5;
            padding: 0 0 20px;
        }
    }

    @media (max-width: 500px) {
        .profile-page {
            max-width: 100%;
        }

        .profile-card {
            padding: 18px;
        }

        .profile-title {
            font-size: 24px;
        }

        .success-alert {
            left: 15px;
            right: 15px;
            width: auto;
        }
    }
</style>


<div class="profile-page">

    {{-- HEADER --}}
    <div class="profile-header">

        <h1 class="profile-title">
            Profil Saya
        </h1>

        <div class="profile-breadcrumb">

            <a href="{{ route('admin.dashboard') }}">
                Dashboard
            </a>

            <span>/</span>

            <span>
                Profil
            </span>

        </div>

    </div>


    {{-- SUCCESS ALERT --}}
    @if(session('success'))

        <div
            class="success-alert"
            id="successAlert"
        >

            <div class="success-icon">
                ✓
            </div>

            <div class="success-text">

                <p class="success-title">
                    Berhasil!
                </p>

                <p class="success-message">
                    {{ session('success') }}
                </p>

            </div>

            <button
                type="button"
                class="success-close"
                onclick="closeSuccessAlert()"
            >
                ×
            </button>

        </div>

    @endif


    {{-- PROFILE CARD --}}
    <div class="profile-card">

        {{-- LEFT --}}
        <div class="profile-left">

            <div class="profile-avatar">

                @if(auth()->user()->profile_photo)

                    <img
                        src="{{ asset('storage/' . auth()->user()->profile_photo) }}"
                        alt="Foto Profil"
                    >

                @else

                    <i class="fa-solid fa-user"></i>

                @endif

            </div>


            {{-- UBAH FOTO --}}
            <a
                href="{{ route('admin.profile.edit') }}"
                class="change-photo-btn"
            >
                Ubah Foto
            </a>

        </div>


        {{-- RIGHT --}}
        <div class="profile-right">

            {{-- NAMA --}}
            <div class="profile-field">

                <label class="profile-label">
                    Nama Lengkap
                </label>

                <div class="profile-value">
                    {{ auth()->user()->name }}
                </div>

            </div>


            {{-- EMAIL --}}
            <div class="profile-field">

                <label class="profile-label">
                    Email
                </label>

                <div class="profile-value">
                    {{ auth()->user()->email }}
                </div>

            </div>


            {{-- ROLE --}}
            <div class="profile-field">

                <label class="profile-label">
                    Role
                </label>

                <div class="profile-value">
                    Super Admin
                </div>

            </div>


            {{-- TELEPON --}}
            <div class="profile-field">

                <label class="profile-label">
                    No. Telepon
                </label>

                <div class="profile-value">
                    {{ auth()->user()->phone ?? '-' }}
                </div>

            </div>


            {{-- BERGABUNG --}}
            <div class="profile-field">

                <label class="profile-label">
                    Bergabung Sejak
                </label>

                <div class="profile-value">

                    {{ auth()->user()->created_at
                        ? auth()->user()->created_at->format('d F Y')
                        : '-'
                    }}

                </div>

            </div>


            {{-- EDIT PROFIL --}}
            <div class="profile-edit-action">

                <a
                    href="{{ route('admin.profile.edit') }}"
                    class="btn-primary"
                >
                    Edit Profil
                </a>

            </div>

        </div>

    </div>

</div>


<script>

    function closeSuccessAlert()
    {
        const alert =
            document.getElementById('successAlert');

        if (alert) {
            alert.remove();
        }
    }

    setTimeout(function () {

        closeSuccessAlert();

    }, 5000);

</script>

@endsection