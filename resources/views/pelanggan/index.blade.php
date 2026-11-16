@extends('layouts.app')

@section('title', 'Data Pelanggan')

@section('content')
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-4">
        <div>
            <h1 class="h3 mb-1">Data Pelanggan</h1>
            <p class="text-secondary mb-0">Kelola pelanggan koperasi sekolah.</p>
        </div>
        <a href="{{ route('pelanggan.create') }}" class="btn btn-primary">Tambah Pelanggan</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('pelanggan.index') }}" method="GET" class="row g-2 mb-3">
                <div class="col-sm-9 col-md-10">
                    <label for="search" class="visually-hidden">Cari nama atau nomor HP</label>
                    <input
                        type="search"
                        name="search"
                        id="search"
                        value="{{ $search }}"
                        class="form-control"
                        placeholder="Cari nama atau nomor HP..."
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
                            <th scope="col">Nama</th>
                            <th scope="col">Tipe Pelanggan</th>
                            <th scope="col">No HP</th>
                            <th scope="col" class="text-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pelanggan as $item)
                            <tr>
                                <td>{{ $pelanggan->firstItem() + $loop->index }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>
                                    <span class="badge text-bg-{{ ['siswa' => 'primary', 'guru' => 'success', 'umum' => 'secondary'][$item->tipe] }}">
                                        {{ ucfirst($item->tipe) }}
                                    </span>
                                </td>
                                <td>{{ $item->no_hp }}</td>
                                <td class="text-end text-nowrap">
                                    <a href="{{ route('pelanggan.edit', $item) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form
                                        action="{{ route('pelanggan.destroy', $item) }}"
                                        method="POST"
                                        class="d-inline"
                                        onsubmit="return confirm('Yakin ingin menghapus pelanggan ini?')"
                                    >
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-secondary py-4">Data pelanggan tidak ditemukan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if ($pelanggan->hasPages())
                <div class="mt-3">
                    {{ $pelanggan->links('pagination::bootstrap-5') }}
                </div>
            @endif
        </div>
    </div>
@endsection
