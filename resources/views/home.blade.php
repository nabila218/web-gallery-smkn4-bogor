<!-- Perintah ini untuk menggunakan kerangka dari layouts/app.blade.php -->
@extends('layouts.app')

<!-- Ini adalah judul yang akan muncul di tab browser -->
@section('title', 'Beranda - Web Gallery SMKN 4 Bogor')

<!-- Ini adalah isi konten yang akan dimasukkan ke dalam kerangka -->
@section('content')

<div class="container">
    <!-- HERO -->
    <div class="hero">
        <div>
            <h1 class="fw-bold">SELAMAT DATANG</h1>
            <h3>Di Web Gallery SMK Negeri 4 Kota Bogor</h3>
        </div>
    </div>

    <!-- GALERI TERBARU -->
    <div class="mt-5">
        <h3 class="section-title">📸 Foto Terbaru</h3>

        @if($photos->count() == 0)
            <p class="text-center">Belum ada foto.</p>
        @endif

        <div class="row g-3">
            @foreach($photos as $photo)
                <div class="col-6 col-md-3">
                    <div class="card shadow-sm">
                        <!-- 
                            PERHATIKAN!
                            Pastikan kamu punya kolom 'image' di tabel 'photos'.
                            Jika nama kolomnya 'filename', ganti 'image' menjadi 'filename'.
                        -->
                        <img src="{{ asset('storage/photos/' . $photo->image) }}" class="card-img-top" alt="{{ $photo->title }}">
                        <div class="card-body p-2">
                            <div class="small fw-bold">{{ $photo->title }}</div>
                            <div class="text-muted small">{{ $photo->category->name ?? 'Tanpa Kategori' }}</div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Ini untuk menampilkan tombol pagination (halaman 1, 2, 3, ...) -->
        <div class="mt-3 d-flex justify-content-center">
            {{ $photos->links() }}
        </div>
    </div>

    <!-- HALAMAN STATIS -->
    <div class="mt-5">
        <h3 class="section-title">📄 Halaman Sekolah</h3>

        <div class="row">
            @foreach($pages as $page)
                <div class="col-md-4 mb-3">
                    <div class="p-3 border rounded bg-white shadow-sm">
                        <h5 class="fw-bold">{{ $page->title }}</h5>
                        <!-- \Str::limit() memotong teks agar tidak terlalu panjang -->
                        <p class="text-muted">{{ \Str::limit($page->content, 100) }}</p>
                        <a href="/page/{{ $page->slug }}" class="btn btn-sm btn-dark">Baca Selengkapnya</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

@endsection