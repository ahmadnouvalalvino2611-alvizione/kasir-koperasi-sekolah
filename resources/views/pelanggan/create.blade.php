@extends('layouts.app')

@section('title', 'Tambah Pelanggan')

@section('content')
    <div class="mb-4">
        <h1 class="h3 mb-1">Tambah Pelanggan</h1>
        <p class="text-secondary mb-0">Isi informasi pelanggan baru.</p>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('pelanggan.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input
                        type="text"
                        name="nama"
                        id="nama"
                        value="{{ old('nama') }}"
                        class="form-control @error('nama') is-invalid @enderror"
                        required
                    >
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="tipe" class="form-label">Tipe Pelanggan</label>
                    <select name="tipe" id="tipe" class="form-select @error('tipe') is-invalid @enderror" required>
                        <option value="">Pilih tipe pelanggan</option>
                        <option value="siswa" @selected(old('tipe') === 'siswa')>Siswa</option>
                        <option value="guru" @selected(old('tipe') === 'guru')>Guru</option>
                        <option value="umum" @selected(old('tipe') === 'umum')>Umum</option>
                    </select>
                    @error('tipe')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="no_hp" class="form-label">No HP</label>
                    <input
                        type="text"
                        name="no_hp"
                        id="no_hp"
                        value="{{ old('no_hp') }}"
                        class="form-control @error('no_hp') is-invalid @enderror"
                        required
                    >
                    @error('no_hp')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('pelanggan.index') }}" class="btn btn-outline-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
@endsection
