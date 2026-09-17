@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

<style>
    /* =========================================================
       DASHBOARD
    ========================================================= */

    .dashboard-page {
        width: 100%;
        max-width: 1000px;
        margin: 0 auto;
    }


    /* =========================================================
       HEADER
    ========================================================= */

    .dashboard-header {
        display: flex;
        justify-content: space-between;
        align-items: center;

        margin-bottom: 24px;
    }

    .dashboard-title {
        font-size: 27px;
        font-weight: 700;

        color: #123d91;

        margin: 0;
    }


    /* =========================================================
       ADMINISTRATOR
       BISA DIKLIK UNTUK MEMBUKA PROFILE
    ========================================================= */

    .admin-name {
        display: flex;
        align-items: center;

        gap: 8px;

        font-size: 14px;
        font-weight: 600;

        color: #111827;

        text-decoration: none;

        cursor: pointer;

        transition: opacity 0.2s ease;
    }

    .admin-name:hover {
        opacity: 0.75;
    }


    /* =========================================================
       FOTO / ICON ADMINISTRATOR
    ========================================================= */

    .admin-icon {
        width: 34px;
        height: 34px;

        border-radius: 50%;

        background: #e8f0ff;

        display: flex;
        align-items: center;
        justify-content: center;

        color: #1555c0;

        flex-shrink: 0;

        overflow: hidden;
    }

    .admin-icon img {
        width: 100%;
        height: 100%;

        object-fit: cover;

        display: block;
    }

    .admin-icon svg {
        width: 20px;
        height: 20px;
    }


    /* =========================================================
       STAT CARD
    ========================================================= */

    .stat-grid {
        display: grid;

        grid-template-columns: repeat(4, 1fr);

        gap: 18px;

        margin-bottom: 28px;
    }

    .stat-card {
        background: white;

        border: 1.5px solid #b7b7b7;

        border-radius: 8px;

        min-height: 145px;

        padding: 15px;

        display: flex;
        flex-direction: column;

        align-items: center;
        justify-content: center;

        text-align: center;
    }


    /* =========================================================
       ICON STATISTIK
    ========================================================= */

    .stat-icon {
        width: 54px;
        height: 54px;

        border-radius: 7px;

        display: flex;
        align-items: center;
        justify-content: center;

        margin-bottom: 10px;

        flex-shrink: 0;
    }

    .stat-icon svg {
        width: 29px;
        height: 29px;

        flex-shrink: 0;
    }

    .stat-icon i {
        width: 29px;
        height: 29px;

        display: flex;
        align-items: center;
        justify-content: center;

        font-size: 29px;
        line-height: 1;

        flex-shrink: 0;
    }


    /* =========================================================
       WARNA ICON
    ========================================================= */

    .icon-artikel {
        background: #e5efff;
        color: #0d5bd7;
    }

    .icon-galeri {
        background: #e0f3e9;
        color: #48a87b;
    }

    .icon-kategori {
        background: #fff3d9;
        color: #f2aa18;
    }

    .icon-admin {
        background: #eee5fa;
        color: #8061b5;
    }


    /* =========================================================
       ANGKA
    ========================================================= */

    .stat-number {
        font-size: 27px;
        font-weight: 700;

        color: #111;

        line-height: 1;

        margin-bottom: 7px;
    }

    .stat-label {
        font-size: 15px;
        font-weight: 600;

        color: #111;
    }


    /* =========================================================
       ARTIKEL + GALERI
    ========================================================= */

    .middle-grid {
        display: grid;

        grid-template-columns: 1.45fr 1fr;

        gap: 18px;

        margin-bottom: 18px;
    }

    .dashboard-box {
        background: white;

        border: 1.5px solid #b7b7b7;

        border-radius: 8px;

        padding: 20px;

        display: flex;
        flex-direction: column;
    }

    .box-title {
        font-size: 22px;
        font-weight: 700;

        color: #111;

        margin: 0 0 17px;
    }


    /* =========================================================
       ARTIKEL TERBARU
    ========================================================= */

    .article-item {
        display: flex;
        align-items: flex-start;

        gap: 11px;

        margin-bottom: 15px;
    }

    .article-icon {
        width: 41px;
        height: 41px;

        border-radius: 7px;

        background: #e5efff;
        color: #1261d7;

        display: flex;
        align-items: center;
        justify-content: center;

        flex-shrink: 0;
    }

    .article-icon svg {
        width: 21px;
        height: 21px;
    }

    .article-content {
        min-width: 0;
    }

    .article-content h4 {
        margin: 0;

        font-size: 16px;
        line-height: 1.2;

        font-weight: 700;

        color: #111;

        word-break: break-word;
    }

    .article-date {
        margin-top: 5px;

        color: #888;

        font-size: 12px;
    }

    .see-more {
        display: inline-block;

        margin-top: auto;

        padding-top: 7px;

        color: #0759d1;

        text-decoration: none;

        font-size: 15px;

        font-weight: 600;
    }

    .see-more:hover {
        text-decoration: underline;
    }


    /* =========================================================
       GALERI TERBARU
    ========================================================= */

    .gallery-grid {
        display: grid;

        grid-template-columns: repeat(3, 1fr);

        gap: 12px;

        margin-top: 1px;
    }

    .gallery-grid img {
        width: 100%;

        height: 82px;

        object-fit: cover;

        border-radius: 8px;

        display: block;
    }


    /* =========================================================
       STATISTIK WEBSITE
    ========================================================= */

    .statistics-box {
        background: white;

        border: 1.5px solid #b7b7b7;

        border-radius: 8px;

        padding: 20px;
    }

    .statistics-content {
        display: grid;

        grid-template-columns: 145px 1fr;

        gap: 25px;

        align-items: center;
    }

    .stat-summary {
        display: flex;
        flex-direction: column;

        gap: 14px;
    }

    .summary-card {
        border: 1.5px solid #4ba7ff;

        background: #eef7ff;

        border-radius: 7px;

        padding: 11px;
    }

    .summary-title {
        font-size: 11px;
        font-weight: 600;

        color: #111;

        margin-bottom: 4px;
    }

    .summary-number {
        font-size: 25px;
        font-weight: 700;

        color: #111;

        line-height: 1;
    }

    .summary-growth {
        font-size: 10px;

        color: #13a85c;

        margin-top: 5px;

        font-weight: 600;
    }

    .chart-area {
        height: 220px;

        position: relative;
    }

    .chart {
        width: 100%;
        height: 100%;
    }

    .chart-line {
        fill: none;

        stroke: #7568ff;

        stroke-width: 2;
    }

    .chart-point {
        fill: white;

        stroke: #7568ff;

        stroke-width: 2;
    }

    .chart-grid-line {
        stroke: #dedede;

        stroke-width: 1;
    }

    .chart-text {
        fill: #777;

        font-size: 10px;
    }


    /* =========================================================
       FOOTER
    ========================================================= */

    .dashboard-footer {
        text-align: center;

        color: #888;

        font-size: 12px;

        padding: 20px 0 5px;
    }


    /* =========================================================
       RESPONSIVE
    ========================================================= */

    @media (max-width: 900px) {

        .stat-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .middle-grid {
            grid-template-columns: 1fr;
        }

    }


    @media (max-width: 600px) {

        .dashboard-page {
            max-width: 100%;
        }

        .dashboard-header {
            align-items: flex-start;
        }

        .stat-grid {
            grid-template-columns: 1fr;
        }

        .statistics-content {
            grid-template-columns: 1fr;
        }

        .gallery-grid img {
            height: 90px;
        }

    }
</style>


<div class="dashboard-page">


    {{-- =====================================================
         HEADER
    ====================================================== --}}

    <div class="dashboard-header">

        <h1 class="dashboard-title">
            Dashboard
        </h1>


        {{-- =================================================
             ADMINISTRATOR
             KLIK → PROFILE
        ================================================== --}}

        <a
            href="{{ route('admin.profile') }}"
            class="admin-name"
        >

            <div class="admin-icon">

                {{-- JIKA SUDAH ADA FOTO PROFIL --}}
                @if(auth()->user()->profile_photo)

                    <img
                        src="{{ asset('storage/' . auth()->user()->profile_photo) }}"
                        alt="Foto Profil"
                    >

                {{-- JIKA BELUM ADA FOTO --}}
                @else

                    <svg
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    >

                        <circle
                            cx="12"
                            cy="8"
                            r="4"
                        ></circle>

                        <path
                            d="M4 21c0-4 3.6-7 8-7s8 3 8 7"
                        ></path>

                    </svg>

                @endif

            </div>

            <span>
                Administrator
            </span>

        </a>

    </div>


    {{-- =====================================================
         4 STATISTIK
    ====================================================== --}}

    <div class="stat-grid">


        {{-- ================= ARTIKEL ================= --}}

        <div class="stat-card">

            <div class="stat-icon icon-artikel">

                <svg
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                >

                    <rect
                        x="5"
                        y="3"
                        width="14"
                        height="18"
                        rx="2"
                    ></rect>

                    <line
                        x1="8"
                        y1="8"
                        x2="16"
                        y2="8"
                    ></line>

                    <line
                        x1="8"
                        y1="12"
                        x2="16"
                        y2="12"
                    ></line>

                    <line
                        x1="8"
                        y1="16"
                        x2="13"
                        y2="16"
                    ></line>

                </svg>

            </div>

            <div class="stat-number">
                {{ $articleCount }}
            </div>

            <div class="stat-label">
                Artikel
            </div>

        </div>


        {{-- ================= GALERI ================= --}}

        <div class="stat-card">

            <div class="stat-icon icon-galeri">

                <svg
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                >

                    <rect
                        x="3"
                        y="4"
                        width="18"
                        height="16"
                        rx="2"
                    ></rect>

                    <circle
                        cx="8.5"
                        cy="9"
                        r="1.5"
                    ></circle>

                    <path
                        d="M21 15l-5-5L5 20"
                    ></path>

                </svg>

            </div>

            <div class="stat-number">
                {{ $photoCount ?? 0 }}
            </div>

            <div class="stat-label">
                Galeri
            </div>

        </div>


        {{-- ================= KATEGORI ================= --}}

        <div class="stat-card">

            <div class="stat-icon icon-kategori">

                <svg
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                >

                    <rect
                        x="4"
                        y="4"
                        width="6"
                        height="6"
                        rx="1"
                    ></rect>

                    <rect
                        x="14"
                        y="4"
                        width="6"
                        height="6"
                        rx="1"
                    ></rect>

                    <rect
                        x="4"
                        y="14"
                        width="6"
                        height="6"
                        rx="1"
                    ></rect>

                    <rect
                        x="14"
                        y="14"
                        width="6"
                        height="6"
                        rx="1"
                    ></rect>

                </svg>

            </div>

            <div class="stat-number">
                {{ $categoryCount ?? 0 }}
            </div>

            <div class="stat-label">
                Kategori
            </div>

        </div>


        {{-- ================= ADMIN ================= --}}

        <div class="stat-card">

            <div class="stat-icon icon-admin">

                <i class="bx bxs-user"></i>

            </div>

            <div class="stat-number">
                {{ $adminCount ?? 1 }}
            </div>

            <div class="stat-label">
                Admin
            </div>

        </div>
</div>


    {{-- =====================================================
         ARTIKEL + GALERI
    ====================================================== --}}

    <div class="middle-grid">


        {{-- ================= ARTIKEL TERBARU ================= --}}

        <div class="dashboard-box">

            <h2 class="box-title">
                Artikel Terbaru
            </h2>


            @forelse($latestArticles ?? [] as $article)

                <div class="article-item">

                    <div class="article-icon">

                        <svg
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        >

                            <rect
                                x="5"
                                y="3"
                                width="14"
                                height="18"
                                rx="2"
                            ></rect>

                            <line
                                x1="8"
                                y1="8"
                                x2="16"
                                y2="8"
                            ></line>

                            <line
                                x1="8"
                                y1="12"
                                x2="16"
                                y2="12"
                            ></line>

                            <line
                                x1="8"
                                y1="16"
                                x2="13"
                                y2="16"
                            ></line>

                        </svg>

                    </div>

                    <div class="article-content">

                        <h4>
                            {{ $article->title }}
                        </h4>

                        <div class="article-date">

                            {{ $article->created_at->format('d F Y') }}

                        </div>

                    </div>

                </div>

            @empty

                <div class="article-date">
                    Belum ada artikel.
                </div>

            @endforelse


            <a
                href="{{ route('admin.articles.index') }}"
                class="see-more"
            >
                Lihat Semua Artikel →
            </a>

        </div>


        {{-- ================= GALERI TERBARU ================= --}}

        <div class="dashboard-box">

            <h2 class="box-title">
                Galeri Terbaru
            </h2>


            <div class="gallery-grid">

                @forelse(($latestPhotos ?? collect())->take(9) as $photo)

                    <img
                        src="{{ asset('storage/' . $photo->image) }}"
                        alt="{{ $photo->title ?? 'Foto Galeri' }}"
                    >

                @empty

                    <img
                        src="{{ asset('storage/photos/2jBRVy9oWvk0o85Eu5EwZLJ0G5jIpKIL0RyIkdn1.png') }}"
                        alt="Foto Galeri"
                    >

                    <img
                        src="{{ asset('storage/photos/7GKi5nBMV0ibOpdfZwAnDQNUKRqOXIxlQzmYQZ92.png') }}"
                        alt="Foto Galeri"
                    >

                    <img
                        src="{{ asset('storage/photos/D1SZDcIPhWHIuCbcsimlsaD96sQVPX0L2ByWE6Mm.png') }}"
                        alt="Foto Galeri"
                    >

                    <img
                        src="{{ asset('storage/photos/BDaIhN5aWzTPSxzDqcT5slVepwqyrsIm78ZxXbul.png') }}"
                        alt="Foto Galeri"
                    >

                    <img
                        src="{{ asset('storage/photos/TaeOBs2f0dPTPA9aTADpC6ImAHbQXrmcxkIl5ZjU.png') }}"
                        alt="Foto Galeri"
                    >

                    <img
                        src="{{ asset('storage/photos/FyXzlYq62I2LsB0bU8GBXq0TQDXo2L1vBDDEkmjq.png') }}"
                        alt="Foto Galeri"
                    >

                    <img
                        src="{{ asset('storage/photos/X3wjK2JgNOEfUyC9qFMDNaQUuonbwmmwCtgV8YQT.jpeg') }}"
                        alt="Foto Galeri"
                    >

                    <img
                        src="{{ asset('storage/photos/2jBRVy9oWvk0o85Eu5EwZLJ0G5jIpKIL0RyIkdn1.png') }}"
                        alt="Foto Galeri"
                    >

                    <img
                        src="{{ asset('storage/photos/7GKi5nBMV0ibOpdfZwAnDQNUKRqOXIxlQzmYQZ92.png') }}"
                        alt="Foto Galeri"
                    >

                @endforelse

            </div>


            <a
                href="{{ route('admin.photos.index') }}"
                class="see-more"
            >
                Lihat Semua Galeri →
            </a>

        </div>

    </div>


    {{-- =====================================================
         STATISTIK WEBSITE
    ====================================================== --}}

    <div class="statistics-box">

        <h2 class="box-title">
            Statistik Website
        </h2>

        <div class="statistics-content">


           {{-- ================= SUMMARY ================= --}}

<div class="stat-summary">

    <div class="summary-card">

        <div class="summary-title">
            Total kunjungan
        </div>

        <div class="summary-number">
            {{ $visitorTotal ?? 0 }}
        </div>

        <div class="summary-growth">
            Semua kunjungan tercatat
        </div>

    </div>


    <div class="summary-card">

        <div class="summary-title">
            Kunjungan hari ini
        </div>

        <div class="summary-number">
            {{ $visitorToday ?? 0 }}
        </div>

        <div class="summary-growth">
            Data hari ini
        </div>

    </div>

</div>


{{-- ================= GRAFIK ================= --}}

<div class="chart-area">

    @php
        $maxVisitor = max(
            collect($visitorChart ?? [])->max('count') ?? 0,
            1
        );

        $chartHeight = 180;
        $chartBottom = 200;
        $chartTop = 20;
        $chartLeft = 40;
        $chartRight = 580;

        $chartCount = count($visitorChart ?? []);
        $chartStep = $chartCount > 1
            ? ($chartRight - $chartLeft) / ($chartCount - 1)
            : 0;

        $points = collect($visitorChart ?? [])->map(function ($item, $index) use (
            $maxVisitor,
            $chartHeight,
            $chartBottom,
            $chartLeft,
            $chartStep
        ) {
            $x = $chartLeft + ($index * $chartStep);

            $y = $chartBottom - (
                ($item['count'] / $maxVisitor) * $chartHeight
            );

            return [
                'x' => $x,
                'y' => $y,
                'date' => $item['date'],
                'count' => $item['count'],
            ];
        });

        $polylinePoints = $points
            ->map(fn ($point) => $point['x'] . ',' . $point['y'])
            ->implode(' ');
    @endphp


    <svg
        class="chart"
        viewBox="0 0 600 230"
        preserveAspectRatio="none"
    >

        {{-- ================= GARIS GRID ================= --}}

        <line
            x1="40"
            y1="20"
            x2="580"
            y2="20"
            class="chart-grid-line"
        />

        <line
            x1="40"
            y1="65"
            x2="580"
            y2="65"
            class="chart-grid-line"
        />

        <line
            x1="40"
            y1="110"
            x2="580"
            y2="110"
            class="chart-grid-line"
        />

        <line
            x1="40"
            y1="155"
            x2="580"
            y2="155"
            class="chart-grid-line"
        />

        <line
            x1="40"
            y1="200"
            x2="580"
            y2="200"
            class="chart-grid-line"
        />


        {{-- ================= LABEL JUMLAH ================= --}}

        <text
            x="10"
            y="23"
            class="chart-text"
        >
            {{ $maxVisitor }}
        </text>

        <text
            x="10"
            y="68"
            class="chart-text"
        >
            {{ round($maxVisitor * 0.75) }}
        </text>

        <text
            x="10"
            y="113"
            class="chart-text"
        >
            {{ round($maxVisitor * 0.50) }}
        </text>

        <text
            x="10"
            y="158"
            class="chart-text"
        >
            {{ round($maxVisitor * 0.25) }}
        </text>

        <text
            x="22"
            y="203"
            class="chart-text"
        >
            0
        </text>


        {{-- ================= GARIS GRAFIK ================= --}}

        @if($points->count() > 1)

            <polyline
                points="{{ $polylinePoints }}"
                class="chart-line"
            />

        @endif


        {{-- ================= TITIK GRAFIK ================= --}}

        @foreach($points as $point)

            <circle
                cx="{{ $point['x'] }}"
                cy="{{ $point['y'] }}"
                r="4"
                class="chart-point"
            />

        @endforeach


        {{-- ================= LABEL TANGGAL ================= --}}

        @foreach($points as $point)

            <text
                x="{{ $point['x'] }}"
                y="220"
                text-anchor="middle"
                class="chart-text"
            >
                {{ $point['date'] }}
            </text>

        @endforeach

    </svg>

</div>
    </div>

</div>

@endsection