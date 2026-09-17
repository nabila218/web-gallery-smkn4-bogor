@extends('layouts.admin')

@section('content')
<h1 class="text-xl font-bold mb-3">Edit Halaman</h1>

<form action="{{ route('admin.pages.update', $page->id) }}" method="POST">
    @csrf @method('PUT')

    <label>Judul</label>
    <input type="text" name="title" value="{{ $page->title }}" class="form-control" required>

    <label>Slug</label>
    <input type="text" name="slug" value="{{ $page->slug }}" class="form-control" required>

    <label>Isi Halaman</label>
    <textarea name="content" rows="6" class="form-control">{{ $page->content }}</textarea>

    <button class="btn btn-primary mt-3">Update</button>
</form>
@endsection
