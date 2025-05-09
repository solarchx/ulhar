<!doctype html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Manajemen Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
    <div class="container">
        <a class="navbar-brand" href="#">Manajemen Buku</a>
        <div class="collapse navbar-collapse">
            @auth
                <ul class="navbar-nav me-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('books.index') }}">Buku</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('publishers.index') }}">Penerbit</a></li>
                </ul>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="btn btn-outline-danger">Logout</button>
                </form>
            @endauth

            @guest
                <a href="{{ route('login') }}" class="btn btn-outline-primary me-2">Login</a>
                <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
            @endguest
        </div>
    </div>
</nav>
@auth
    <ul class="navbar-nav me-auto">
        <li class="nav-item"><a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a></li>
        @if(auth()->user()->isAdmin())
            <li class="nav-item"><a class="nav-link" href="{{ route('books.index') }}">Buku</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('publishers.index') }}">Penerbit</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('admin.create') }}">Tambah Admin</a></li>
        @endif
    </ul>
@endauth

    @yield('content')
</body>
</html>
