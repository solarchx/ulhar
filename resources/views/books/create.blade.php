@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ isset($book) ? 'Edit' : 'Tambah' }} Buku</h1>

    <form method="POST" action="{{ isset($book) ? route('books.update', $book) : route('books.store') }}">
        @csrf
        @if(isset($book)) @method('PUT') @endif

        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $book->title ?? '') }}">
        </div>

        <div class="mb-3">
            <label>Penulis</label>
            <input type="text" name="author" class="form-control" value="{{ old('author', $book->author ?? '') }}">
        </div>

        <div class="mb-3">
            <label>Tahun</label>
            <input type="number" name="year" class="form-control" value="{{ old('year', $book->year ?? '') }}">
        </div>

        <div class="mb-3">
            <label>Penerbit</label>
            <select name="publisher_id" class="form-control">
                @foreach($publishers as $publisher)
                    <option value="{{ $publisher->id }}"
                        {{ (old('publisher_id', $book->publisher_id ?? '') == $publisher->id) ? 'selected' : '' }}>
                        {{ $publisher->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-success">Simpan</button>
        <a href="{{ route('books.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
