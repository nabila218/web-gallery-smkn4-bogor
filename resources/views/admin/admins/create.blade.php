@extends('layouts.admin')

@section('title','Tambah Admin')

@section('content')

<h2>Tambah Admin</h2>

@if ($errors->any())
    <div class="card" style="border-left:6px solid red;margin-bottom:15px;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('admin.admins.store') }}"
      method="POST"
      class="card"
      style="max-width:500px;">

    @csrf

    <div style="margin-bottom:12px;">
        <label>Nama</label><br>
        <input type="text"
               name="name"
               value="{{ old('name') }}"
               required
               style="width:100%;padding:8px;">
    </div>

    <div style="margin-bottom:12px;">
        <label>Email</label><br>
        <input type="email"
               name="email"
               value="{{ old('email') }}"
               required
               style="width:100%;padding:8px;">
    </div>

    <div style="margin-bottom:12px;">
        <label>Password</label><br>
        <input type="password"
               name="password"
               required
               style="width:100%;padding:8px;">
    </div>

    <div style="margin-bottom:15px;">
        <label>Konfirmasi Password</label><br>
        <input type="password"
               name="password_confirmation"
               required
               style="width:100%;padding:8px;">
    </div>

    <button class="btn">Simpan</button>

</form>

@endsection
