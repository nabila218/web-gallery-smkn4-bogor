@extends('layouts.admin')

@section('title', 'Detail Artikel')

@section('content')

<div style="max-width: 930px; margin: 0 auto;">

    <h1 style="
        color: #123d91;
        font-size: 30px;
        margin-bottom: 25px;
    ">
        Detail Artikel
    </h1>


    <div style="
        background: white;
        border: 1.5px solid #dbe7f7;
        border-radius: 8px;
        padding: 25px;
    ">


        {{-- JUDUL --}}

        <h2 style="
            margin: 0 0 15px;
            font-size: 28px;
            color: #111;
        ">
            {{ $article->title }}
        </h2>


        {{-- INFO --}}

        <div style="
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 20px;
        ">

            {{-- KATEGORI --}}

            <span style="
                background: #eaf2ff;
                color: #0759d1;
                padding: 7px 12px;
                border-radius: 6px;
                font-size: 14px;
                font-weight: 600;
            ">
                Kategori:
                {{ $article->category->name ?? '-' }}
            </span>


            {{-- STATUS --}}

@if(strtolower($article->status) === 'publish')

    <span style="
        background: #def2e8;
        color: #238653;
        padding: 7px 12px;
        border-radius: 6px;
        font-size: 14px;
        font-weight: 600;
    ">
        Published
    </span>

@else

    <span style="
        background: #fff3d9;
        color: #c98a00;
        padding: 7px 12px;
        border-radius: 6px;
        font-size: 14px;
        font-weight: 600;
    ">
        Draft
    </span>

@endif

            {{-- TANGGAL --}}

            <span style="
                background: #f3f3f3;
                color: #777;
                padding: 7px 12px;
                border-radius: 6px;
                font-size: 14px;
            ">
                {{ $article->created_at->format('d M Y') }}
            </span>

        </div>


        {{-- GAMBAR --}}

        @if($article->image)

            <div style="margin-bottom: 25px;">

                <img
                    src="{{ asset('storage/' . $article->image) }}"
                    alt="{{ $article->title }}"
                    style="
                        width: 100%;
                        max-height: 400px;
                        object-fit: cover;
                        border-radius: 8px;
                        display: block;
                    "
                >

            </div>

        @endif


        {{-- ISI ARTIKEL --}}

        <div style="
            color: #333;
            font-size: 16px;
            line-height: 1.7;
            white-space: pre-line;
        ">
            {{ $article->content }}
        </div>


        {{-- BUTTON --}}

        <div style="
            display: flex;
            gap: 10px;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #e5e5e5;
        ">

            <a
                href="{{ route('admin.articles.index') }}"
                style="
                    padding: 11px 17px;
                    background: #eee;
                    color: #555;
                    border-radius: 7px;
                    text-decoration: none;
                    font-weight: 700;
                "
            >
                Kembali
            </a>

            <a
                href="{{ route('admin.articles.edit', $article) }}"
                style="
                    padding: 11px 17px;
                    background: #fff3d9;
                    color: #d89500;
                    border-radius: 7px;
                    text-decoration: none;
                    font-weight: 700;
                "
            >
                Edit Artikel
            </a>

        </div>

    </div>

</div>

@endsection