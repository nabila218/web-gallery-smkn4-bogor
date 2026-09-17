@extends('layouts.admin')

@section('content')
<h1 class="text-2xl font-bold mb-6">Manajemen Halaman</h1>

<form method="POST" class="bg-white p-4 rounded shadow mb-6 space-y-2">
@csrf
<input name="title" placeholder="Judul" class="border w-full p-2 rounded">
<textarea name="content" placeholder="Isi halaman"
          class="border w-full p-2 rounded h-32"></textarea>
<button class="bg-blue-600 text-white px-4 py-2 rounded">
Simpan
</button>
</form>

<div class="bg-white rounded shadow">
@foreach($pages as $page)
<div class="p-4 border-b flex justify-between">
    <span>{{ $page->title }}</span>
    <form method="POST" action="{{ route('admin.pages.destroy',$page) }}">
        @csrf @method('DELETE')
        <button class="text-red-600">Hapus</button>
    </form>
</div>
@endforeach
</div>
@endsection
