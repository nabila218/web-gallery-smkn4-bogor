@extends('layouts.admin')

@section('content')
<h1 class="text-xl font-bold mb-3">Tambah Halaman</h1>

<form action="{{ route('admin.pages.store') }}" method="POST">
    @csrf

    <label>Judul</label>
    <input type="text" name="title" class="form-control" required>

    <label>Slug</label>
    <input type="text" name="slug" class="form-control" required>

    <label>Isi Halaman</label>
    <textarea name="content" class="form-control" rows="6"></textarea>

    <button class="btn btn-primary mt-3">Simpan</button>
</form>
@endsection
