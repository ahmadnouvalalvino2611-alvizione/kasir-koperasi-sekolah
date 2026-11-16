@extends('layouts.app')

@section('title', 'Data Kategori')

@section('content')
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-4">
        <div>
            <h1 class="h3 mb-1">Data Kategori</h1>
            <p class="text-secondary mb-0">Kelola kategori produk koperasi sekolah.</p>
        </div>
        <a href="{{ route('kategori.create') }}" class="btn btn-primary">Tambah Kategori</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('kategori.index') }}" method="GET" class="row g-2 mb-3">
                <div class="col-sm-9 col-md-10">
                    <label for="search" class="visually-hidden">Cari nama kategori</label>
                    <input
                        type="search"
                        name="search"
                        id="search"
                        value="{{ $search }}"
                        class="form-control"
                        placeholder="Cari nama kategori..."
                    >
                </div>
                <div class="col-sm-3 col-md-2 d-grid">
                    <button type="submit" class="btn btn-outline-primary">Cari</button>
                </div>
            </form>

            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle mb-0">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Kategori</th>
                            <th scope="col" class="text-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($kategori as $item)
                            <tr>
                                <td>{{ $kategori->firstItem() + $loop->index }}</td>
                                <td>{{ $item->nama }}</td>
                                <td class="text-end text-nowrap">
                                    <a href="{{ route('kategori.edit', $item) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form
                                        action="{{ route('kategori.destroy', $item) }}"
                                        method="POST"
                                        class="d-inline"
                                        onsubmit="return confirm('Yakin ingin menghapus kategori ini?')"
                                    >
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center text-secondary py-4">Data kategori tidak ditemukan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if ($kategori->hasPages())
                <div class="mt-3">
                    {{ $kategori->links('pagination::bootstrap-5') }}
                </div>
            @endif
        </div>
    </div>
@endsection
