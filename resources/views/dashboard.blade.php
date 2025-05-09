@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Dashboard</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <p>Selamat datang, {{ auth()->user()->name }}!</p>

    @if(auth()->user()->isAdmin())
        <a href="{{ route('books.index') }}" class="btn btn-primary">Kelola Buku</a>
        <a href="{{ route('publishers.index') }}" class="btn btn-primary">Kelola Penerbit</a>
        <a href="{{ route('admin.create') }}" class="btn btn-warning">Tambah Admin</a>
    @else
        <p>Akun Anda adalah user biasa. Tidak memiliki akses admin.</p>
    @endif
</div>
@endsection
