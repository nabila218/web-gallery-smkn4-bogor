@extends('layouts.admin')

@section('title','Edit Foto')

@section('content')

@if ($errors->any())
    <div style="background:#fee2e2;color:#991b1b;padding:12px;border-radius:8px;margin-bottom:15px;">
        <ul style="margin:0;padding-left:20px;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST"
      action="{{ route('admin.photos.update', $photo) }}"
      enctype="multipart/form-data">

    @csrf
    @method('PUT')

    <div style="margin-bottom:12px;">
        <label>Judul Foto</label><br>
        <input type="text"
               name="title"
               value="{{ old('title',$photo->title) }}"
               required
               style="width:100%;padding:8px;">
    </div>

    <div style="margin-bottom:12px;">
        <label>Kategori</label><br>
        <select name="category_id"
                required
                style="width:100%;padding:8px;">
            @foreach($categories as $c)
                <option value="{{ $c->id }}"
                    {{ $photo->category_id == $c->id ? 'selected' : '' }}>
                    {{ $c->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div style="margin-bottom:12px;">
        <label>Deskripsi</label><br>
        <textarea name="description"
                  rows="4"
                  style="width:100%;padding:8px;">{{ old('description',$photo->description) }}</textarea>
    </div>

    <div style="margin-bottom:12px;">
        <label>Foto Lama</label><br>
        <img src="{{ asset('storage/'.$photo->image) }}"
             style="width:140px;border-radius:8px;">
    </div>

    <div style="margin-bottom:12px;">
        <label>Ganti Foto (opsional)</label><br>
        <input type="file"
               name="image"
               accept="image/*">
    </div>

    <button type="submit" class="btn">
        Update
    </button>

</form>

@endsection