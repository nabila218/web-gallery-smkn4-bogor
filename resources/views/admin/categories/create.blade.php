@extends('layouts.admin')

@section('title', 'Tambah Kategori')

@section('content')

<style>
    .category-form-page {
        width: 100%;
        max-width: 700px;
        margin: 0 auto;
    }

    .category-form-page h1 {
        margin: 0 0 25px;

        font-size: 30px;
        font-weight: 700;

        color: #123d91;
    }

    .category-form-card {
        background: white;

        border: 1.5px solid #dbe7f7;
        border-radius: 8px;

        padding: 28px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;

        margin-bottom: 8px;

        font-size: 16px;
        font-weight: 700;
    }

    .form-group input {
        width: 100%;

        padding: 12px 14px;

        border: 1px solid #d1d5db;
        border-radius: 7px;

        font-family: inherit;
        font-size: 16px;
    }

    .form-group input:focus {
        outline: none;
        border-color: #0e57d8;
    }

    .category-type-options {
        display: flex;
        gap: 25px;
        align-items: center;
    }

    .category-type-option {
        display: flex;
        align-items: center;
        gap: 8px;

        font-size: 16px;
        font-weight: 400;

        cursor: pointer;
    }

    .category-type-option input {
        width: 17px;
        height: 17px;

        margin: 0;

        accent-color: #0e57d8;

        cursor: pointer;
    }

    .form-actions {
        display: flex;
        gap: 10px;
    }

    .btn-save,
    .btn-cancel {
        height: 42px;

        padding: 0 16px;

        border-radius: 7px;

        font-family: inherit;
        font-size: 16px;
        font-weight: 700;

        text-decoration: none;

        cursor: pointer;
    }

    .btn-save {
        border: none;
        background: #0e57d8;
        color: white;
    }

    .btn-save:hover {
        background: #0848b8;
    }

    .btn-cancel {
        display: inline-flex;
        align-items: center;

        background: #f3f4f6;
        color: #555;
    }

    .btn-cancel:hover {
        background: #e5e7eb;
    }

    .form-error {
        margin-bottom: 20px;

        padding: 12px 15px;

        background: #ffdede;
        color: #b42323;

        border-radius: 7px;

        font-size: 14px;
    }
</style>


<div class="category-form-page">

    <h1>Tambah Kategori</h1>


    @if($errors->any())

        <div class="form-error">

            <ul style="margin:0;padding-left:20px;">

                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach

            </ul>

        </div>

    @endif


    <div class="category-form-card">

        <form
            action="{{ route('admin.categories.store') }}"
            method="POST"
        >

            @csrf

            <div class="form-group">

                <label for="name">
                    Nama Kategori
                </label>

                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name') }}"
                    placeholder="Masukkan nama kategori"
                    required
                    autofocus
                >

            </div>


            <div class="form-group">

                <label>
                    Jenis Kategori
                </label>

                <div class="category-type-options">

                    <label class="category-type-option">

                        <input
                            type="radio"
                            name="category_type"
                            value="gallery"
                            {{ old('category_type') === 'gallery' ? 'checked' : '' }}
                            required
                        >

                        Galeri

                    </label>


                    <label class="category-type-option">

                        <input
                            type="radio"
                            name="category_type"
                            value="article"
                            {{ old('category_type') === 'article' ? 'checked' : '' }}
                            required
                        >

                        Artikel

                    </label>

                </div>

            </div>


            <div class="form-actions">

                <button
                    type="submit"
                    class="btn-save"
                >
                    Simpan
                </button>

                <a
                    href="{{ route('admin.categories.index') }}"
                    class="btn-cancel"
                >
                    Batal
                </a>

            </div>

        </form>

    </div>

</div>

@endsection