@extends('layouts.app')

@section('title', 'Edit Pelanggan')

@section('content')
    <div class="mb-4">
        <h1 class="h3 mb-1">Edit Pelanggan</h1>
        <p class="text-secondary mb-0">Perbarui informasi pelanggan.</p>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('pelanggan.update', $pelanggan) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input
                        type="text"
                        name="nama"
                        id="nama"
                        value="{{ old('nama', $pelanggan->nama) }}"
                        class="form-control @error('nama') is-invalid @enderror"
                        required
                    >
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="tipe" class="form-label">Tipe Pelanggan</label>
                    <select
                        name="tipe"
                        id="tipe"
                        class="form-select @error('tipe') is-invalid @enderror"
                        required
                    >
                        <option value="">Pilih tipe pelanggan</option>
                        <option value="siswa" @selected(old('tipe', $pelanggan->tipe) === 'siswa')>Siswa</option>
                        <option value="guru" @selected(old('tipe', $pelanggan->tipe) === 'guru')>Guru</option>
                        <option value="umum" @selected(old('tipe', $pelanggan->tipe) === 'umum')>Umum</option>
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
                        value="{{ old('no_hp', $pelanggan->no_hp) }}"
                        class="form-control @error('no_hp') is-invalid @enderror"
                        required
                    >
                    @error('no_hp')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    <a href="{{ route('pelanggan.index') }}" class="btn btn-outline-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
@endsection
