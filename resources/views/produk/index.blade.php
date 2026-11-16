@extends('layouts.app')

@section('title', 'Daftar Produk')
@section('content')
<<<<<<< HEAD
@include('partials.alerts')
=======
>>>>>>> 7852ec3e701ca6a29b3a612aa59e0de9ddcd5cb7
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3 mb-0">Daftar Produk</h1>
    <a href="{{ route('produk.create') }}" class="btn btn-primary">Tambah Produk</a>
</div>
<div class="card"><div class="card-body table-responsive">
    <table class="table table-striped table-hover align-middle mb-0">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Nama Produk</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($produks as $item)
            <tr>
                <td>{{ $produks->firstItem() + $loop->index }}</td>
                <td>{{ $item->kode_produk }}</td>
                <td>{{ $item->nama_produk }}</td>
<<<<<<< HEAD
                <td>{{ $item->kategori->nama ?? '-' }}</td>
=======
                <td>{{ $item->kategori->nama_kategori ?? '-' }}</td>
>>>>>>> 7852ec3e701ca6a29b3a612aa59e0de9ddcd5cb7
                <td>Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                <td>{{ $item->stok }}</td>
                <td>
                    <a href="{{ route('produk.edit', $item) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('produk.destroy', $item) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
                <tr><td colspan="7" class="text-center text-muted">Belum ada produk.</td></tr>
            @endforelse
        </tbody>
    </table>
<<<<<<< HEAD
    {{ $produks->links('pagination::bootstrap-5') }}
=======
    {{ $produks->links() }}
>>>>>>> 7852ec3e701ca6a29b3a612aa59e0de9ddcd5cb7
</div></div>
@endsection
