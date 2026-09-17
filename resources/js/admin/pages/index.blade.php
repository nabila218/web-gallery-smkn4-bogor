@extends('layouts.admin')

@section('content')
<h1 class="text-xl font-bold mb-3">Halaman Statis</h1>

<a href="{{ route('admin.pages.create') }}" class="btn btn-primary mb-3">Tambah Halaman</a>

<table class="table">
    <thead>
        <tr>
            <th>Judul</th>
            <th>Slug</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pages as $page)
        <tr>
            <td>{{ $page->title }}</td>
            <td>{{ $page->slug }}</td>
            <td>
                <a href="{{ route('admin.pages.edit', $page->id) }}" class="btn btn-warning btn-sm">Edit</a>

                <form action="{{ route('admin.pages.destroy', $page->id) }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm"
                        onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
