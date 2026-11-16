@extends('layouts.app')

@section('title', 'Tambah Kategori')

@section('content')
    <div class="mb-4">
        <h1 class="h3 mb-1">Tambah Kategori</h1>
        <p class="text-secondary mb-0">Isi nama kategori baru.</p>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('kategori.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Kategori</label>
                    <input
                        type="text"
                        name="nama"
                        id="nama"
                        value="{{ old('nama') }}"
                        class="form-control @error('nama') is-invalid @enderror"
                        maxlength="255"
                        required
                        autofocus
                    >
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('kategori.index') }}" class="btn btn-outline-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
@endsection
