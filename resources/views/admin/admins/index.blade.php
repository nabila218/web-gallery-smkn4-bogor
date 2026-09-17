@extends('layouts.admin')

@section('title','Admin User')

@section('content')

<h2 style="margin-bottom:20px;">Manajemen Admin</h2>

@if(session('success'))
    <div class="card" style="border-left:6px solid #16a34a;margin-bottom:20px;">
        {{ session('success') }}
    </div>
@endif

<div class="card">

    <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:15px;">
        <strong>Daftar Admin</strong>
        <a href="{{ route('admin.admins.create') }}" class="btn">
            + Tambah Admin
        </a>
    </div>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        @forelse($admins as $admin)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $admin->name }}</td>
                <td>{{ $admin->email }}</td>
                <td>
                    <span style="
                        padding:4px 10px;
                        border-radius:20px;
                        font-size:12px;
                        background:#2563eb;
                        color:white;">
                        Admin
                    </span>
                </td>
                <td>
                    <form action="{{ route('admin.admins.destroy',$admin->id) }}"
                          method="POST"
                          onsubmit="return confirm('Hapus admin ini?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn" style="background:#dc2626;">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5">Belum ada admin</td>
            </tr>
        @endforelse
        </tbody>
    </table>

</div>

@endsection
