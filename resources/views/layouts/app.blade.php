<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Kasir Koperasi Sekolah')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="{{ route('dashboard') }}">Kasir Koperasi</a>
            <ul class="navbar-nav flex-row gap-3 me-auto ms-3">
                <li class="nav-item">
                    <a class="nav-link @if (request()->routeIs('dashboard')) active @endif" href="{{ route('dashboard') }}">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if (request()->routeIs('pelanggan.*')) active @endif" href="{{ route('pelanggan.index') }}">Pelanggan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if (request()->routeIs('kategori.*')) active @endif" href="{{ route('kategori.index') }}">Kategori</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if (request()->routeIs('produk.*')) active @endif" href="{{ route('produk.index') }}">Produk</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if (request()->routeIs('transaksi.*')) active @endif" href="{{ route('transaksi.index') }}">Transaksi</a>
                </li>
            </ul>
        </div>
    </nav>

    <main class="container py-4">
        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
