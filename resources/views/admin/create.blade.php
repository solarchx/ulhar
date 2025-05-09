@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Admin Baru</h1>

    <form method="POST" action="{{ route('admin.store') }}">
        @csrf

        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Konfirmasi Password</label>
            <input type="password" name="password_confirmation" class="form-control" required>
        </div>

        <button class="btn btn-success">Simpan Admin</button>
        <a href="{{ route('dashboard') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
