@extends('layouts.admin')

@section('title', 'Edit Kategori')

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

    .category-type-display {
        width: 100%;

        padding: 12px 14px;

        background: #f8fafc;

        border: 1px solid #d1d5db;
        border-radius: 7px;

        font-family: inherit;
        font-size: 16px;

        color: #555;
    }

    .form-actions {
        display: flex;
        gap: 10px;
    }

    .btn-update,
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

    .btn-update {
        border: none;
        background: #0e57d8;
        color: white;
    }

    .btn-update:hover {
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

    <h1>Edit Kategori</h1>


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
            action="{{ url('/admin/categories/' . $category->category_source . '-' . $category->id) }}"
            method="POST"
        >

            @csrf
            @method('PUT')


            <div class="form-group">

                <label for="name">
                    Nama Kategori
                </label>

                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name', $category->name) }}"
                    placeholder="Masukkan nama kategori"
                    required
                    autofocus
                >

            </div>


            <div class="form-group">

                <label>
                    Jenis Kategori
                </label>

                <div class="category-type-display">
                    {{ $category->category_source === 'article' ? 'Artikel' : 'Galeri' }}
                </div>

            </div>


            <div class="form-actions">

                <button
                    type="submit"
                    class="btn-update"
                >
                    Simpan Perubahan
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