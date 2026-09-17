@extends('layouts.admin')

@section('title', 'Detail Galeri')

@section('content')

<style>
    .photo-show-page {
        max-width: 900px;
        margin: 0 auto;
    }

    .photo-show-header {
        margin-bottom: 25px;
    }

    .photo-show-header h1 {
        margin: 0 0 10px;
        font-size: 30px;
        color: #123d91;
    }

    .breadcrumb {
        display: flex;
        gap: 7px;
        font-size: 18px;
        font-weight: 600;
    }

    .breadcrumb .home {
        color: #0759d1;
    }

    .breadcrumb .separator,
    .breadcrumb .current {
        color: #999;
    }

    .photo-show-card {
        background: white;
        border: 1px solid #d1d5db;
        border-radius: 10px;
        padding: 25px;
    }

    .photo-show-image {
        width: 100%;
        max-height: 500px;
        object-fit: contain;
        display: block;
        margin: 0 auto 25px;
        border-radius: 8px;
        background: #f5f5f5;
    }

    .photo-show-title {
        font-size: 24px;
        font-weight: 700;
        color: #123d91;
        margin-bottom: 12px;
    }

    .photo-show-category {
        margin-bottom: 15px;
        color: #555;
        font-size: 15px;
    }

    .photo-show-description {
        color: #555;
        line-height: 1.6;
        margin-bottom: 25px;
    }

    .photo-show-actions {
        display: flex;
        gap: 10px;
    }

    .btn-back,
    .btn-edit {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 7px;
        padding: 10px 16px;
        border-radius: 7px;
        text-decoration: none;
        font-weight: 600;
    }

    .btn-back {
        background: #e5e7eb;
        color: #374151;
    }

    .btn-edit {
        background: #0e57d8;
        color: white;
    }

    .btn-back:hover {
        background: #d1d5db;
    }

    .btn-edit:hover {
        background: #0848b8;
    }
</style>

<div class="photo-show-page">

    <div class="photo-show-header">

        <h1>Detail Galeri</h1>

        <div class="breadcrumb">
            <span class="home">Dashboard</span>
            <span class="separator">/</span>
            <span class="home">Galeri</span>
            <span class="separator">/</span>
            <span class="current">Detail</span>
        </div>

    </div>

    <div class="photo-show-card">

        {{-- FOTO --}}
        @if($photo->image)

            <img
                src="{{ asset('storage/' . $photo->image) }}"
                alt="{{ $photo->title }}"
                class="photo-show-image"
            >

        @else

            <div style="
                height:300px;
                display:flex;
                align-items:center;
                justify-content:center;
                background:#f3f4f6;
                color:#999;
                border-radius:8px;
                margin-bottom:25px;
            ">
                Foto tidak tersedia
            </div>

        @endif


        {{-- JUDUL --}}
        <div class="photo-show-title">
            {{ $photo->title }}
        </div>


        {{-- KATEGORI --}}
        @if($photo->category)

            <div class="photo-show-category">
                <strong>Kategori:</strong>
                {{ $photo->category->name }}
            </div>

        @endif


        {{-- DESKRIPSI --}}
        @if($photo->description)

            <div class="photo-show-description">
                <strong>Deskripsi:</strong>

                <div>
                    {{ $photo->description }}
                </div>
            </div>

        @endif


        {{-- BUTTON --}}
        <div class="photo-show-actions">

            <a
                href="{{ route('admin.photos.index') }}"
                class="btn-back"
            >
                <i class="fa-solid fa-arrow-left"></i>
                Kembali
            </a>

            <a
                href="{{ route('admin.photos.edit', $photo) }}"
                class="btn-edit"
            >
                <i class="fa-solid fa-pen-to-square"></i>
                Edit
            </a>

        </div>

    </div>

</div>

@endsection