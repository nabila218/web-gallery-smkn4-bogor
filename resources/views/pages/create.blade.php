<x-app-layout>
<div class="max-w-2xl mx-auto py-8">
    <h2 class="text-xl mb-4">{{ isset($page) ? 'Edit Halaman' : 'Tambah Halaman' }}</h2>
    <form action="{{ isset($page) ? route('admin.pages.update', $page) : route('admin.pages.store') }}" method="POST" class="space-y-3 card p-4">
        @csrf
        @if(isset($page))
            @method('PUT')
        @endif
        <input name="title" placeholder="Judul Halaman" class="w-full p-2 border rounded" value="{{ $page->title ?? '' }}" required />
        <input name="slug" placeholder="Slug (url)" class="w-full p-2 border rounded" value="{{ $page->slug ?? '' }}" required />
        <textarea name="content" placeholder="Konten Halaman" class="w-full p-2 border rounded" rows="6">{{ $page->content ?? '' }}</textarea>
        <div><button class="px-4 py-2 bg-[var(--brown)] text-white rounded">Simpan</button></div>
    </form>
</div>
</x-app-layout>
