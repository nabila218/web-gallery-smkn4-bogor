@extends('layouts.app')

@section('title', $page->title)

@section('content')

<style>
    /* =========================================================
       PAGE DETAIL
    ========================================================= */

    .detail-page {
        width: 100%;
        background: #ffffff;
        padding: 34px 40px 65px;
    }

    .detail-container {
        width: 100%;
        max-width: 1100px;
        margin: 0 auto;
    }


    /* =========================
       HEADER
    ========================= */

    .detail-header {
        text-align: center;
        margin-bottom: 28px;
    }

    .detail-title {
        margin: 0;
        color: #16418f;
        font-size: 24px;
        line-height: 1.3;
        font-weight: 700;
    }


    /* =========================
       BREADCRUMB
    ========================= */

    .detail-breadcrumb {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 7px;

        margin-top: 8px;

        font-size: 12px;
        line-height: 1.4;
        font-weight: 400;
    }

    .detail-breadcrumb a {
        color: #16418f;
        text-decoration: none;
    }

    .detail-breadcrumb a:hover {
        text-decoration: underline;
    }

    .detail-breadcrumb .separator {
        color: #999999;
    }

    .detail-breadcrumb .current {
        color: #777777;
    }


    /* =========================
       IMAGE
    ========================= */

.detail-image {
    width: 100%;
    height: 400px;
    overflow: hidden;
    border-radius: 6px;
    margin-bottom: 32px;

    background: #0156C2;

    display: flex;
    align-items: center;
    justify-content: center;
}

.detail-image img {
    width: 100%;
    height: 100%;
    object-fit: contain;
    display: block;
}


    /* =========================
       CONTENT
    ========================= */

    .detail-content {
        width: 100%;
    }

    .detail-content h2 {
        margin: 0 0 13px;
        color: #222222;
        font-size: 20px;
        line-height: 1.4;
        font-weight: 700;
    }

    .detail-content h3 {
        margin: 34px 0 12px;
        color: #222222;
        font-size: 19px;
        line-height: 1.4;
        font-weight: 700;
    }

    .detail-content p {
        margin: 0 0 17px;
        color: #444444;
        font-size: 14px;
        line-height: 1.7;
        font-weight: 400;
        text-align: justify;
    }


    /* =========================
       RESPONSIVE
    ========================= */

    @media (max-width: 800px) {

        .detail-page {
            padding: 30px 25px 55px;
        }

        .detail-title {
            font-size: 23px;
        }

        .detail-image {
            height: 330px;
        }

        .detail-content h2 {
            font-size: 19px;
        }

        .detail-content h3 {
            font-size: 18px;
        }

        .detail-content p {
            font-size: 13px;
        }
    }


    @media (max-width: 500px) {

        .detail-page {
            padding: 25px 18px 45px;
        }

        .detail-title {
            font-size: 21px;
        }

        .detail-breadcrumb {
            font-size: 11px;
        }

        .detail-image {
            height: 230px;
            margin-bottom: 25px;
        }

        .detail-content h2 {
            font-size: 18px;
        }

        .detail-content h3 {
            font-size: 17px;
        }

        .detail-content p {
            font-size: 13px;
            line-height: 1.65;
        }
    }
</style>


<section class="detail-page">

    <div class="detail-container">

        {{-- =========================
             HEADER
        ========================== --}}
        <div class="detail-header">

            <h1 class="detail-title">
                {{ $page->title }}
            </h1>

            <div class="detail-breadcrumb">

                <a href="{{ route('home') }}">
                    Beranda
                </a>

                <span class="separator">/</span>

                <span class="current">
                    {{ $page->title }}
                </span>

            </div>

        </div>


        {{-- =========================
             FOTO HALAMAN
        ========================== --}}
        <div class="detail-image">

            @if ($page->slug === 'sambutan-kepala-sekolah')

                <img
                    src="{{ asset('storage/profile/kepala-sekolah.PNG') }}"
                    alt="{{ $setting?->principal_name ?? $page->title }}"
                >

            @elseif ($page->slug === 'tentang-sekolah')

                <img
                    src="{{ $setting?->school_image
                        ? asset('storage/' . $setting->school_image)
                        : asset('storage/profile/sekolah.jpg') }}"
                    alt="{{ $page->title }}"
                >

            @else

                <img
                    src="{{ asset('storage/profile/sekolah.jpg') }}"
                    alt="{{ $page->title }}"
                >

            @endif

        </div>


        {{-- =========================
             ISI HALAMAN
        ========================== --}}
        <div class="detail-content">

            @if ($page->slug === 'sambutan-kepala-sekolah')

                {!! nl2br(e($setting?->greeting ?? $page->content)) !!}


            @elseif ($page->slug === 'tentang-sekolah')

                @if (!empty($setting?->about_description))

                    <h2>
                        Tentang Sekolah
                    </h2>

                    {!! nl2br(e($setting->about_description)) !!}

                @endif


                @if (!empty($setting?->school_history))

                    <h3>
                        Sejarah Sekolah
                    </h3>

                    {!! nl2br(e($setting->school_history)) !!}

                @endif


                @if (
                    empty($setting?->about_description) &&
                    empty($setting?->school_history)
                )

                    {!! nl2br(e($page->content)) !!}

                @endif


            @else

                {!! nl2br(e($page->content)) !!}

            @endif

        </div>

    </div>

</section>

@endsection