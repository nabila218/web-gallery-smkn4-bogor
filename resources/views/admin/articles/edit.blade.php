@extends('layouts.admin')

@section('title', 'Edit Artikel')

@section('content')

<div style="max-width: 930px; margin: 0 auto;">

    <h1 style="
        color: #123d91;
        font-size: 30px;
        margin-bottom: 25px;
    ">
        Edit Artikel
    </h1>


    @if($errors->any())

        <div style="
            background: #ffdede;
            color: #c62828;
            padding: 15px;
            border-radius: 7px;
            margin-bottom: 20px;
        ">

            <ul style="margin: 0; padding-left: 20px;">

                @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif


    <form
        action="{{ route('admin.articles.update', $article) }}"
        method="POST"
        enctype="multipart/form-data"
    >

        @csrf
        @method('PUT')


        {{-- JUDUL --}}

        <div style="margin-bottom: 20px;">

            <label
                for="title"
                style="
                    display: block;
                    margin-bottom: 8px;
                    font-weight: 700;
                "
            >
                Judul
            </label>

            <input
                type="text"
                name="title"
                id="title"
                value="{{ old('title', $article->title) }}"
                required
                style="
                    width: 100%;
                    padding: 12px;
                    border: 1px solid #ccc;
                    border-radius: 7px;
                "
            >

        </div>


        {{-- KATEGORI --}}

        <div style="margin-bottom: 20px;">

            <label
                for="category_id"
                style="
                    display: block;
                    margin-bottom: 8px;
                    font-weight: 700;
                "
            >
                Kategori
            </label>

            <select
                name="category_id"
                id="category_id"
                required
                style="
                    width: 100%;
                    padding: 12px;
                    border: 1px solid #ccc;
                    border-radius: 7px;
                    background: white;
                "
            >

                <option value="">
                    Pilih Kategori
                </option>

                @foreach($categories as $category)

                    <option
                        value="{{ $category->id }}"
                        {{ old('category_id', $article->category_id) == $category->id ? 'selected' : '' }}
                    >
                        {{ $category->name }}
                    </option>

                @endforeach

            </select>

        </div>


        {{-- ISI ARTIKEL --}}

        <div style="margin-bottom: 20px;">

            <label
                for="content"
                style="
                    display: block;
                    margin-bottom: 8px;
                    font-weight: 700;
                "
            >
                Isi Artikel
            </label>

            <textarea
                name="content"
                id="content"
                rows="10"
                required
                style="
                    width: 100%;
                    padding: 12px;
                    border: 1px solid #ccc;
                    border-radius: 7px;
                    resize: vertical;
                "
            >{{ old('content', $article->content) }}</textarea>

        </div>


            {{-- STATUS --}}

            <div style="margin-bottom: 25px;">

                <label
                    for="status"
                    style="
                        display: block;
                        margin-bottom: 8px;
                        font-weight: 700;
                    "
                >
                    Status
                </label>

                <select
                    name="status"
                    id="status"
                    required
                    style="
                        width: 100%;
                        padding: 12px;
                        border: 1px solid #ccc;
                        border-radius: 7px;
                        background: white;
                    "
                >

                    <option
                        value="draft"
                        {{ old('status', strtolower($article->status ?? 'publish')) === 'draft' ? 'selected' : '' }}
                    >
                        Draft
                    </option>

                    <option
                        value="publish"
                        {{ old('status', strtolower($article->status ?? 'publish')) === 'publish' ? 'selected' : '' }}
                    >
                        Publish
                    </option>

                </select>

            </div>


        {{-- GAMBAR --}}

        <div style="margin-bottom: 25px;">

            <label
                for="image"
                style="
                    display: block;
                    margin-bottom: 8px;
                    font-weight: 700;
                "
            >
                Gambar
            </label>

            @if($article->image)

                <div style="margin-bottom: 10px;">

                    <img
                        src="{{ asset('storage/' . $article->image) }}"
                        alt="{{ $article->title }}"
                        style="
                            width: 180px;
                            height: 110px;
                            object-fit: cover;
                            border-radius: 7px;
                            border: 1px solid #ddd;
                        "
                    >

                </div>

            @endif

            <input
                type="file"
                name="image"
                id="image"
                accept="image/*"
            >

            <div style="
                margin-top: 6px;
                color: #888;
                font-size: 13px;
            ">
                Kosongkan jika tidak ingin mengganti gambar.
            </div>

        </div>


        {{-- BUTTON --}}

        <div style="
            display: flex;
            gap: 10px;
        ">

            <a
                href="{{ route('admin.articles.index') }}"
                style="
                    padding: 12px 18px;
                    background: #eee;
                    color: #555;
                    border-radius: 7px;
                    text-decoration: none;
                    font-weight: 700;
                "
            >
                Batal
            </a>

            <button
                type="submit"
                style="
                    padding: 12px 18px;
                    background: #0e57d8;
                    color: white;
                    border: none;
                    border-radius: 7px;
                    font-weight: 700;
                    cursor: pointer;
                "
            >
                Simpan Perubahan
            </button>

        </div>

    </form>

</div>

@endsection