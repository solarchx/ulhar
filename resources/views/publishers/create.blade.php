@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ isset($publisher) ? 'Edit' : 'Tambah' }} Penerbit</h1>

    <form method="POST" action="{{ isset($publisher) ? route('publishers.update', $publisher) : route('publishers.store') }}">
        @csrf
        @if(isset($publisher)) @method('PUT') @endif

        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $publisher->name ?? '') }}">
        </div>

        <div class="mb-3">
            <label>Alamat</label>
            <textarea name="address" class="form-control">{{ old('address', $publisher->address ?? '') }}</textarea>
        </div>

        <button class="btn btn-success">Simpan</button>
        <a href="{{ route('publishers.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
