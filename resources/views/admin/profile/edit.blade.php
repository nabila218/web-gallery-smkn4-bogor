@extends('layouts.admin')

@section('title', 'Edit Profil')

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


    /* =========================
       CARD
    ========================= */

    .edit-card {
        width: 100%;
        background: #fff;
        border: 1.5px solid #b7b7b7;
        border-radius: 8px;
        padding: 25px;
        box-sizing: border-box;
    }

    .edit-heading {
        margin: 0 0 5px;
        color: #111;
        font-size: 21px;
        font-weight: 700;
    }

    .edit-description {
        margin: 0 0 22px;
        color: #777;
        font-size: 13px;
    }


    /* =========================
       FOTO
    ========================= */

    .photo-section {
        display: flex;
        align-items: center;
        gap: 18px;

        padding: 15px;

        margin-bottom: 22px;

        background: #fafafa;

        border: 1.5px solid #e5e5e5;
        border-radius: 8px;
    }

    .profile-preview {
        width: 85px;
        height: 85px;

        flex-shrink: 0;

        border-radius: 50%;

        overflow: hidden;

        background: #e5efff;

        color: #0759d1;

        display: flex;
        align-items: center;
        justify-content: center;
    }

    .profile-preview img {
        width: 100%;
        height: 100%;

        object-fit: cover;
    }

    .profile-preview i {
        font-size: 45px;
    }

    .photo-info {
        min-width: 0;
    }

    .photo-title {
        margin: 0 0 4px;

        color: #111;

        font-size: 14px;
        font-weight: 700;
    }

    .photo-description {
        margin: 0 0 10px;

        color: #888;

        font-size: 12px;
    }

    .photo-input {
        width: 100%;

        font-size: 12px;

        color: #555;
    }


    /* =========================
       FORM
    ========================= */

    .form-group {
        margin-bottom: 17px;
    }

    .form-label {
        display: block;

        margin-bottom: 6px;

        color: #111;

        font-size: 14px;
        font-weight: 700;
    }

    .form-control {
        width: 100%;

        height: 42px;

        padding: 0 12px;

        box-sizing: border-box;

        border: 1.5px solid #dedede;
        border-radius: 7px;

        background: #fff;

        color: #333;

        font-family: Arial, Helvetica, sans-serif;

        font-size: 14px;

        outline: none;

        transition: .2s;
    }

    .form-control:focus {
        border-color: #0759d1;

        box-shadow:
            0 0 0 2px rgba(7,89,209,.08);
    }

    .form-control:disabled {
        background: #f7f7f7;
        color: #888;
    }

    .form-error {
        margin-top: 5px;

        color: #df3c3c;

        font-size: 12px;
    }


    /* =========================
       BUTTON
    ========================= */

    .profile-actions {
        display: flex;

        justify-content: flex-end;

        gap: 10px;

        margin-top: 22px;
    }

    .btn {
        min-width: 110px;

        height: 40px;

        padding: 0 17px;

        border-radius: 7px;

        font-family: Arial, Helvetica, sans-serif;

        font-size: 14px;
        font-weight: 700;

        cursor: pointer;

        display: inline-flex;

        align-items: center;
        justify-content: center;

        box-sizing: border-box;

        text-decoration: none;
    }

    .btn-primary {
        border: 1px solid #0759d1;

        background: #0759d1;

        color: #fff;
    }

    .btn-primary:hover {
        background: #0649ad;
    }

    .btn-outline {
        border: 1.5px solid #0759d1;

        background: #fff;

        color: #0759d1;
    }

    .btn-outline:hover {
        background: #f0f6ff;
    }


    /* =========================
       MODAL
    ========================= */

    .modal-overlay {
        position: fixed;

        inset: 0;

        background: rgba(0,0,0,.35);

        display: none;

        align-items: center;
        justify-content: center;

        padding: 20px;

        z-index: 2000;
    }

    .modal-overlay.show {
        display: flex;
    }

    .cancel-modal {
        width: 100%;

        max-width: 430px;

        background: #fff;

        border-radius: 9px;

        padding: 25px;

        text-align: center;

        box-shadow:
            0 15px 40px rgba(0,0,0,.18);
    }

    .modal-icon {
        width: 55px;
        height: 55px;

        margin: 0 auto 15px;

        border: 3px solid #df3c3c;

        border-radius: 50%;

        color: #df3c3c;

        display: flex;

        align-items: center;
        justify-content: center;

        font-size: 28px;
        font-weight: 700;
    }

    .modal-title {
        margin: 0 0 8px;

        color: #111;

        font-size: 20px;
        font-weight: 700;
    }

    .modal-text {
        margin: 0 auto 20px;

        max-width: 350px;

        color: #888;

        font-size: 13px;

        line-height: 1.5;
    }

    .modal-actions {
        display: flex;

        justify-content: center;

        gap: 10px;
    }

    .modal-btn {
        height: 40px;

        padding: 0 16px;

        border-radius: 7px;

        font-size: 13px;

        font-weight: 700;

        cursor: pointer;
    }

    .modal-continue {
        border: 1.5px solid #0759d1;

        background: #fff;

        color: #0759d1;
    }

    .modal-cancel {
        border: 1px solid #df3c3c;

        background: #df3c3c;

        color: #fff;
    }

    .modal-cancel:hover {
        background: #c92f2f;
    }


    @media (max-width: 600px) {

        .edit-card {
            padding: 18px;
        }

        .profile-title {
            font-size: 24px;
        }

        .photo-section {
            align-items: flex-start;
            flex-direction: column;
        }

        .profile-actions {
            flex-direction: column-reverse;
        }

        .btn {
            width: 100%;
        }

        .modal-actions {
            flex-direction: column;
        }

        .modal-btn {
            width: 100%;
        }
    }
</style>


<div class="profile-page">


    {{-- HEADER --}}
    <div class="profile-header">

        <h1 class="profile-title">
            Edit Profil
        </h1>

        <div class="profile-breadcrumb">

            <a href="{{ route('admin.dashboard') }}">
                Dashboard
            </a>

            <span>/</span>

            <a href="{{ route('admin.profile') }}">
                Profil
            </a>

            <span>/</span>

            <span>
                Edit
            </span>

        </div>

    </div>


    {{-- CARD --}}
    <div class="edit-card">

        <h2 class="edit-heading">
            Edit Profil
        </h2>

        <p class="edit-description">
            Ubah informasi administrator kemudian simpan perubahan.
        </p>


        {{-- FORM --}}
        <form
            action="{{ route('admin.profile.update') }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf

            @method('PUT')


            {{-- FOTO --}}
            <div class="photo-section">

                <div class="profile-preview">

                    @if(auth()->user()->profile_photo)

                        <img
                            id="profilePreview"
                            src="{{ asset('storage/' . auth()->user()->profile_photo) }}"
                            alt="Foto Profil"
                        >

                    @else

                        <i
                            id="profileIcon"
                            class="fa-solid fa-user"
                        ></i>

                        <img
                            id="profilePreview"
                            src=""
                            alt="Preview Foto"
                            style="display:none;"
                        >

                    @endif

                </div>


                <div class="photo-info">

                    <p class="photo-title">
                        Foto Profil
                    </p>

                    <p class="photo-description">
                        JPG, JPEG, PNG, atau WEBP. Maksimal 2 MB.
                    </p>

                    <input
                        type="file"
                        name="profile_photo"
                        id="profile_photo"
                        class="photo-input"
                        accept=".jpg,.jpeg,.png,.webp"
                    >

                    @error('profile_photo')

                        <div class="form-error">
                            {{ $message }}
                        </div>

                    @enderror

                </div>

            </div>


            {{-- NAMA --}}
            <div class="form-group">

                <label
                    for="name"
                    class="form-label"
                >
                    Nama Lengkap
                </label>

                <input
                    type="text"
                    id="name"
                    name="name"
                    class="form-control"
                    value="{{ old('name', auth()->user()->name) }}"
                    required
                >

                @error('name')

                    <div class="form-error">
                        {{ $message }}
                    </div>

                @enderror

            </div>


            {{-- EMAIL --}}
            <div class="form-group">

                <label
                    for="email"
                    class="form-label"
                >
                    Email
                </label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    class="form-control"
                    value="{{ old('email', auth()->user()->email) }}"
                    required
                >

                @error('email')

                    <div class="form-error">
                        {{ $message }}
                    </div>

                @enderror

            </div>


            {{-- ROLE --}}
            <div class="form-group">

                <label
                    for="role"
                    class="form-label"
                >
                    Role
                </label>

                <input
                    type="text"
                    id="role"
                    class="form-control"
                    value="Super Admin"
                    disabled
                >

            </div>


            {{-- TELEPON --}}
            <div class="form-group">

                <label
                    for="phone"
                    class="form-label"
                >
                    No. Telepon
                </label>

                <input
                    type="text"
                    id="phone"
                    name="phone"
                    class="form-control"
                    value="{{ old('phone', auth()->user()->phone ?? '') }}"
                    placeholder="Masukkan nomor telepon"
                >

                @error('phone')

                    <div class="form-error">
                        {{ $message }}
                    </div>

                @enderror

            </div>


            {{-- BERGABUNG --}}
            <div class="form-group">

                <label
                    for="joined_at"
                    class="form-label"
                >
                    Bergabung Sejak
                </label>

                <input
                    type="text"
                    id="joined_at"
                    class="form-control"
                    value="{{ auth()->user()->created_at
                        ? auth()->user()->created_at->format('d F Y')
                        : '-'
                    }}"
                    disabled
                >

            </div>


            {{-- ACTION --}}
            <div class="profile-actions">

                <button
                    type="button"
                    class="btn btn-outline"
                    onclick="openCancelModal()"
                >
                    Batal
                </button>

                <button
                    type="submit"
                    class="btn btn-primary"
                >
                    Simpan Perubahan
                </button>

            </div>

        </form>

    </div>

</div>


{{-- MODAL BATAL --}}
<div
    class="modal-overlay"
    id="cancelModal"
>

    <div class="cancel-modal">

        <div class="modal-icon">
            !
        </div>

        <h2 class="modal-title">
            Batalkan Perubahan?
        </h2>

        <p class="modal-text">
            Perubahan yang belum disimpan akan hilang.
            Yakin ingin membatalkan?
        </p>

        <div class="modal-actions">

            <button
                type="button"
                class="modal-btn modal-continue"
                onclick="closeCancelModal()"
            >
                Tidak, lanjutkan edit
            </button>

            <button
                type="button"
                class="modal-btn modal-cancel"
                onclick="cancelEdit()"
            >
                Ya, batalkan
            </button>

        </div>

    </div>

</div>


<script>

    /*
    |--------------------------------------------------------------------------
    | PREVIEW FOTO
    |--------------------------------------------------------------------------
    */

    const photoInput =
        document.getElementById('profile_photo');

    const profilePreview =
        document.getElementById('profilePreview');

    const profileIcon =
        document.getElementById('profileIcon');


    if (photoInput) {

        photoInput.addEventListener('change', function(event) {

            const file =
                event.target.files[0];

            if (!file) {
                return;
            }

            const reader =
                new FileReader();

            reader.onload = function(e) {

                if (profilePreview) {

                    profilePreview.src =
                        e.target.result;

                    profilePreview.style.display =
                        'block';

                }

                if (profileIcon) {

                    profileIcon.style.display =
                        'none';

                }

            };

            reader.readAsDataURL(file);

        });

    }


    /*
    |--------------------------------------------------------------------------
    | MODAL
    |--------------------------------------------------------------------------
    */

    function openCancelModal()
    {
        const modal =
            document.getElementById('cancelModal');

        if (modal) {

            modal.classList.add('show');

            document.body.style.overflow =
                'hidden';
        }
    }


    function closeCancelModal()
    {
        const modal =
            document.getElementById('cancelModal');

        if (modal) {

            modal.classList.remove('show');

            document.body.style.overflow =
                '';
        }
    }


    function cancelEdit()
    {
        window.location.href =
            "{{ route('admin.profile') }}";
    }


    document.addEventListener('click', function(event)
    {
        const modal =
            document.getElementById('cancelModal');

        if (
            modal &&
            event.target === modal
        ) {

            closeCancelModal();

        }
    });


    document.addEventListener('keydown', function(event)
    {
        if (event.key === 'Escape') {

            closeCancelModal();

        }
    });

</script>

@endsection