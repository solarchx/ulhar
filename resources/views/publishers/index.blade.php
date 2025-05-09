@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Penerbit</h1>
    <a href="{{ route('publishers.create') }}" class="btn btn-primary mb-3">Tambah Penerbit</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr><th>Nama</th><th>Alamat</th><th>Aksi</th></tr>
        </thead>
        <tbody>
            @foreach($publishers as $publisher)
            <tr>
                <td>{{ $publisher->name }}</td>
                <td>{{ $publisher->address }}</td>
                <td>
                    <a href="{{ route('publishers.edit', $publisher) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('publishers.destroy', $publisher) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button onclick="return confirm('Hapus penerbit ini?')" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
