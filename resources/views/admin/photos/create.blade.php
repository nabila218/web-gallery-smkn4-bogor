@extends('layouts.admin')

@section('title','Tambah Foto')

@section('content')

<h2 style="margin-bottom:20px;">Tambah Foto</h2>

@if ($errors->any())
    <div class="card" style="border-left:6px solid #dc2626;margin-bottom:20px;">
        <ul style="margin:0;padding-left:20px;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<style>
.form-group{
    margin-bottom:16px;
}
.form-group label{
    display:block;
    margin-bottom:6px;
    font-weight:600;
}
.form-group input,
.form-group textarea,
.form-group select{
    width:100%;
    padding:10px;
    border:1px solid #d1d5db;
    border-radius:6px;
    font-size:14px;
}
.form-group input:focus,
.form-group textarea:focus,
.form-group select:focus{
    outline:none;
    border-color:#2563eb;
}
</style>

<form action="{{ route('admin.photos.store') }}"
      method="POST"
      enctype="multipart/form-data"
      class="card"
      style="max-width:600px;">

    @csrf

    <div class="form-group">
        <label>Judul Foto</label>
        <input type="text"
               name="title"
               value="{{ old('title') }}"
               required>
    </div>

    <div class="form-group">
        <label>Kategori</label>
        <select name="category_id" required>
            <option value="">-- Pilih kategori --</option>

            @foreach($categories as $c)
                <option value="{{ $c->id }}"
                    {{ old('category_id') == $c->id ? 'selected' : '' }}>
                    {{ $c->name }}
                </option>
            @endforeach

        </select>
    </div>

    <div class="form-group">
        <label>Deskripsi</label>
        <textarea name="description"
                  rows="4">{{ old('description') }}</textarea>
    </div>

    <div class="form-group">
        <label>File Foto</label>
        <input type="file"
               name="image"
               accept="image/*"
               required>
    </div>

    <button class="btn">Simpan</button>

</form>

@endsection