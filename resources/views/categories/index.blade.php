@extends('layouts.admin')

@section('content')
<div class="card">
    <h2>Data Kategori</h2>

    {{-- FORM TAMBAH KATEGORI --}}
    <form action="{{ route('admin.categories.store') }}" method="POST" style="margin:15px 0;">
        @csrf
        <input
            type="text"
            name="name"
            placeholder="Nama kategori"
            required
            style="padding:8px;width:250px"
        >
        <button class="btn">Tambah</button>
    </form>

    {{-- TABEL KATEGORI --}}
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($categories as $cat)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $cat->name }}</td>
                    <td>
                        <form action="{{ route('admin.categories.destroy',$cat->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Hapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">Belum ada kategori</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
