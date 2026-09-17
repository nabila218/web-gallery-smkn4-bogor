@extends('layouts.admin')

@section('title', 'Edit Kontak')

@section('content')

<div style="max-width: 930px; margin: 0 auto;">

    <h1 style="
        color: #123d91;
        font-size: 30px;
        margin-bottom: 25px;
    ">
        Edit Kontak
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
        action="{{ route('admin.contacts.update') }}"
        method="POST"
    >

        @csrf
        @method('PUT')


        {{-- ALAMAT --}}

        <div style="margin-bottom: 20px;">

            <label
                for="address"
                style="display:block; margin-bottom:8px; font-weight:700;"
            >
                Alamat
            </label>

            <textarea
                name="address"
                id="address"
                rows="3"
                style="
                    width:100%;
                    padding:12px;
                    border:1px solid #ccc;
                    border-radius:7px;
                    resize:vertical;
                "
            >{{ old('address', $contact->address ?? '') }}</textarea>

        </div>


        {{-- TELEPON --}}

        <div style="margin-bottom: 20px;">

            <label
                for="phone"
                style="display:block; margin-bottom:8px; font-weight:700;"
            >
                No. Telepon
            </label>

            <input
                type="text"
                name="phone"
                id="phone"
                value="{{ old('phone', $contact->phone ?? '') }}"
                style="
                    width:100%;
                    padding:12px;
                    border:1px solid #ccc;
                    border-radius:7px;
                "
            >

        </div>


        {{-- EMAIL --}}

        <div style="margin-bottom: 20px;">

            <label
                for="email"
                style="display:block; margin-bottom:8px; font-weight:700;"
            >
                Email
            </label>

            <input
                type="email"
                name="email"
                id="email"
                value="{{ old('email', $contact->email ?? '') }}"
                style="
                    width:100%;
                    padding:12px;
                    border:1px solid #ccc;
                    border-radius:7px;
                "
            >

        </div>


        {{-- WHATSAPP --}}

        <div style="margin-bottom: 20px;">

            <label
                for="whatsapp"
                style="display:block; margin-bottom:8px; font-weight:700;"
            >
                WhatsApp
            </label>

            <input
                type="text"
                name="whatsapp"
                id="whatsapp"
                value="{{ old('whatsapp', $contact->whatsapp ?? '') }}"
                style="
                    width:100%;
                    padding:12px;
                    border:1px solid #ccc;
                    border-radius:7px;
                "
            >

        </div>


        {{-- GOOGLE MAPS --}}

        <div style="margin-bottom: 20px;">

            <label
                for="google_maps"
                style="display:block; margin-bottom:8px; font-weight:700;"
            >
                Google Maps
            </label>

            <input
                type="text"
                name="google_maps"
                id="google_maps"
                value="{{ old('google_maps', $contact->google_maps ?? '') }}"
                style="
                    width:100%;
                    padding:12px;
                    border:1px solid #ccc;
                    border-radius:7px;
                "
            >

        </div>


        {{-- HARI OPERASIONAL --}}

        <div style="margin-bottom: 20px;">

            <label
                for="operational_days"
                style="display:block; margin-bottom:8px; font-weight:700;"
            >
                Hari Operasional
            </label>

            <input
                type="text"
                name="operational_days"
                id="operational_days"
                value="{{ old('operational_days', $contact->operational_days ?? '') }}"
                placeholder="Contoh: Senin - Jumat"
                style="
                    width:100%;
                    padding:12px;
                    border:1px solid #ccc;
                    border-radius:7px;
                "
            >

        </div>


        {{-- JAM BUKA --}}

        <div style="margin-bottom: 20px;">

            <label
                for="opening_time"
                style="display:block; margin-bottom:8px; font-weight:700;"
            >
                Jam Buka
            </label>

            <input
                type="text"
                name="opening_time"
                id="opening_time"
                value="{{ old('opening_time', $contact->opening_time ?? '') }}"
                placeholder="Contoh: 06.30"
                style="
                    width:100%;
                    padding:12px;
                    border:1px solid #ccc;
                    border-radius:7px;
                "
            >

        </div>


        {{-- JAM TUTUP --}}

        <div style="margin-bottom: 20px;">

            <label
                for="closing_time"
                style="display:block; margin-bottom:8px; font-weight:700;"
            >
                Jam Tutup
            </label>

            <input
                type="text"
                name="closing_time"
                id="closing_time"
                value="{{ old('closing_time', $contact->closing_time ?? '') }}"
                placeholder="Contoh: 16.30"
                style="
                    width:100%;
                    padding:12px;
                    border:1px solid #ccc;
                    border-radius:7px;
                "
            >

        </div>


        {{-- MEDIA SOSIAL --}}

        <h2 style="
            font-size:22px;
            margin:30px 0 20px;
        ">
            Media Sosial
        </h2>


        {{-- TWITTER --}}

        <div style="margin-bottom: 20px;">

            <label
                for="twitter"
                style="display:block; margin-bottom:8px; font-weight:700;"
            >
                Twitter
            </label>

            <input
                type="text"
                name="twitter"
                id="twitter"
                value="{{ old('twitter', $contact->twitter ?? '') }}"
                style="
                    width:100%;
                    padding:12px;
                    border:1px solid #ccc;
                    border-radius:7px;
                "
            >

        </div>


        {{-- INSTAGRAM --}}

        <div style="margin-bottom: 20px;">

            <label
                for="instagram"
                style="display:block; margin-bottom:8px; font-weight:700;"
            >
                Instagram
            </label>

            <input
                type="text"
                name="instagram"
                id="instagram"
                value="{{ old('instagram', $contact->instagram ?? '') }}"
                style="
                    width:100%;
                    padding:12px;
                    border:1px solid #ccc;
                    border-radius:7px;
                "
            >

        </div>


        {{-- FACEBOOK --}}

        <div style="margin-bottom: 20px;">

            <label
                for="facebook"
                style="display:block; margin-bottom:8px; font-weight:700;"
            >
                Facebook
            </label>

            <input
                type="text"
                name="facebook"
                id="facebook"
                value="{{ old('facebook', $contact->facebook ?? '') }}"
                style="
                    width:100%;
                    padding:12px;
                    border:1px solid #ccc;
                    border-radius:7px;
                "
            >

        </div>


        {{-- YOUTUBE --}}

        <div style="margin-bottom: 25px;">

            <label
                for="youtube"
                style="display:block; margin-bottom:8px; font-weight:700;"
            >
                YouTube
            </label>

            <input
                type="text"
                name="youtube"
                id="youtube"
                value="{{ old('youtube', $contact->youtube ?? '') }}"
                style="
                    width:100%;
                    padding:12px;
                    border:1px solid #ccc;
                    border-radius:7px;
                "
            >

        </div>


        {{-- BUTTON --}}

        <div style="display:flex; gap:10px;">

            <a
                href="{{ route('admin.contacts.index') }}"
                style="
                    padding:12px 18px;
                    background:#eee;
                    color:#555;
                    border-radius:7px;
                    text-decoration:none;
                    font-weight:700;
                "
            >
                Batal
            </a>

            <button
                type="submit"
                style="
                    padding:12px 18px;
                    background:#0e57d8;
                    color:white;
                    border:none;
                    border-radius:7px;
                    font-weight:700;
                    cursor:pointer;
                "
            >
                Simpan Perubahan
            </button>

        </div>

    </form>

</div>

@endsection