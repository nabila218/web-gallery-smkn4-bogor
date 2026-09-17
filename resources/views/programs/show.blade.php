@extends('layouts.app')

@section('title', $program['title'])

@section('content')

<style>

    /* =========================================================
       PROGRAM DETAIL
    ========================================================== */

    .program-detail-page {
        width: 100%;
        background: #ffffff;
        padding: 20px 40px 70px;
    }

    .program-detail-container {
        width: 100%;
        max-width: 1100px;
        margin: 0 auto;
    }


    /* =========================================================
       BREADCRUMB
    ========================================================== */

    .program-breadcrumb {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 7px;

    margin-top: 14px;

    font-size: 12px;
    line-height: 1.4;
    font-weight: 400;
}

    .program-breadcrumb a {
        color: #16418f;
        text-decoration: none;
    }

    .program-breadcrumb a:hover {
        text-decoration: underline;
    }

    .program-breadcrumb .separator {
        color: #999999;
    }

    .program-breadcrumb .current {
        color: #777777;
    }


    /* =========================================================
       BANNER
    ========================================================== */

    .program-banner {
        position: relative;

        width: 100%;
        height: 360px;

        overflow: hidden;
        border-radius: 7px;

        background-image:
            linear-gradient(
                rgba(10, 35, 80, 0.52),
                rgba(10, 35, 80, 0.52)
            ),
            url("{{ asset($program['banner']) }}");

        background-size: cover;
        background-position: center;

        display: flex;
        align-items: center;
        justify-content: center;

        text-align: center;
    }


    /* =========================================================
       BANNER TEXT
    ========================================================== */

    .program-banner-content {
        width: 100%;
        max-width: 850px;
        padding: 30px;
        margin: 0 auto;

        color: #ffffff;
    }

    .program-banner-logo {
        width: 72px;
        height: 72px;

        object-fit: contain;

        margin: 0 auto 18px;

        display: block;

        filter: drop-shadow(0 2px 5px rgba(0, 0, 0, 0.25));
    }

    .program-banner-title {
        margin: 0;

        font-size: 32px;
        line-height: 1.25;
        font-weight: 700;

        text-align: center;

        text-shadow:
            0 2px 6px rgba(0, 0, 0, 0.25);
    }

    .program-banner-code {
        margin: 8px 0 0;

        font-size: 17px;
        line-height: 1.4;
        font-weight: 400;

        text-align: center;

        opacity: 0.95;
    }


    /* =========================================================
       CONTENT
    ========================================================== */

    .program-detail-content {
        width: 100%;
        max-width: 1000px;

        margin: 38px auto 0;
    }

    .program-description {
        margin: 0;

        color: #444444;

        font-size: 14px;
        line-height: 1.75;
        font-weight: 400;

        text-align: justify;
    }


    /* =========================================================
       TWO COLUMN
    ========================================================== */

    .program-info-grid {
        display: grid;

        grid-template-columns: 1fr 1fr;

        gap: 70px;

        margin-top: 38px;
    }

    .program-info-column {
        width: 100%;
    }

    .program-info-title {
        margin: 0 0 15px;

        color: #16418f;

        font-size: 18px;
        line-height: 1.4;
        font-weight: 700;
    }

    .program-info-list {
        margin: 0;
        padding-left: 21px;

        color: #444444;

        font-size: 14px;
        line-height: 1.75;
        font-weight: 400;
    }

    .program-info-list li {
        margin-bottom: 3px;
    }


    /* =========================================================
       INSTAGRAM
    ========================================================== */

    .program-instagram {
        margin-top: 42px;

        text-align: center;
    }

    .program-instagram a {
        color: #16418f;

        text-decoration: none;

        font-size: 15px;
        line-height: 1.5;
        font-weight: 600;
    }

    .program-instagram a:hover {
        text-decoration: underline;
    }

    .program-instagram i {
        margin-right: 7px;
    }


    /* =========================================================
       RESPONSIVE
    ========================================================== */

    @media (max-width: 800px) {

        .program-detail-page {
            padding: 20px 25px 55px;
        }

        .program-banner {
            height: 320px;
        }

        .program-banner-title {
            font-size: 27px;
        }

        .program-banner-code {
            font-size: 15px;
        }

        .program-info-grid {
            grid-template-columns: 1fr;
            gap: 30px;
        }
    }


    @media (max-width: 500px) {

        .program-detail-page {
            padding: 18px 18px 45px;
        }

        .program-breadcrumb {
            font-size: 11px;
        }

        .program-banner {
            height: 280px;
        }

        .program-banner-content {
            padding: 20px;
        }

        .program-banner-logo {
            width: 58px;
            height: 58px;
            margin-bottom: 14px;
        }

        .program-banner-title {
            font-size: 23px;
        }

        .program-banner-code {
            font-size: 14px;
        }

        .program-detail-content {
            margin-top: 28px;
        }

        .program-description {
            font-size: 13px;
            line-height: 1.7;
        }

        .program-info-grid {
            margin-top: 30px;
        }

        .program-info-title {
            font-size: 17px;
        }

        .program-info-list {
            font-size: 13px;
        }

        .program-instagram a {
            font-size: 14px;
        }
    }

</style>


<section class="program-detail-page">

    <div class="program-detail-container">


         {{-- =================================================
             BREADCRUMB
        ================================================== --}}

        <div class="program-breadcrumb">

            <a href="{{ route('home') }}">
                Beranda
            </a>

            <span class="separator">
                /
            </span>

            <a href="{{ route('home') }}#program">
                Program Keahlian
            </a>

            <span class="separator">
                /
            </span>

            <span class="current">
                {{ $program['short_title'] }}
            </span>

        </div>

        {{-- =================================================
             BANNER PROGRAM
        ================================================== --}}

        <div class="program-banner">

            <div class="program-banner-content">

                <img
                    src="{{ asset($program['logo']) }}"
                    alt="{{ $program['short_title'] }}"
                    class="program-banner-logo"
                >

                <h1 class="program-banner-title">
                    {{ $program['title'] }}
                </h1>

                <p class="program-banner-code">
                    {{ $program['short_title'] }}
                </p>

            </div>

        </div>

        {{-- =================================================
             CONTENT
        ================================================== --}}

        <div class="program-detail-content">


            {{-- DESKRIPSI --}}

            <p class="program-description">
                {{ $program['description'] }}
            </p>


            {{-- =================================================
                 MATERI + PELUANG KARIER
            ================================================== --}}

            <div class="program-info-grid">


                {{-- MATERI --}}

                <div class="program-info-column">

                    <h2 class="program-info-title">
                        Materi yang Dipelajari
                    </h2>

                    <ul class="program-info-list">

                        @foreach ($program['materials'] as $material)

                            <li>
                                {{ $material }}
                            </li>

                        @endforeach

                    </ul>

                </div>


                {{-- KARIER --}}

                <div class="program-info-column">

                    <h2 class="program-info-title">
                        Peluang Karier
                    </h2>

                    <ul class="program-info-list">

                        @foreach ($program['careers'] as $career)

                            <li>
                                {{ $career }}
                            </li>

                        @endforeach

                    </ul>

                </div>

            </div>


            {{-- =================================================
                 INSTAGRAM
            ================================================== --}}

            @if (!empty($program['instagram']))

                <div class="program-instagram">

                <a
                    href="{{ $program['instagram_url'] }}"
                    target="_blank"
                    rel="noopener noreferrer"
                    aria-label="Instagram {{ $program['short_title'] }}"
                >

                    <i class="fa-brands fa-instagram"></i>

                    Instagram: {{ $program['instagram'] }}

                </a>

            </div>

            @endif


        </div>

    </div>

</section>

@endsection