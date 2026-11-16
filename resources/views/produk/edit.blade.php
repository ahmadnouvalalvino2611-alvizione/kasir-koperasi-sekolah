@extends('layouts.app')
@section('title', 'Edit Produk')
@section('content')
<<<<<<< HEAD
@include('partials.alerts')
=======
>>>>>>> 7852ec3e701ca6a29b3a612aa59e0de9ddcd5cb7
<div class="card"><div class="card-body">
    <h1 class="h3 mb-4">Edit Produk</h1>
    <form action="{{ route('produk.update', $produk) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3"><label for="kategori_id" class="form-label">Kategori</label>
            <select id="kategori_id" name="kategori_id" class="form-select" required>
                <option value="">Pilih kategori</option>
                @foreach ($kategoris as $kategori)
<<<<<<< HEAD
                    <option value="{{ $kategori->id }}" @selected(old('kategori_id', $produk->kategori_id) == $kategori->id)>{{ $kategori->nama }}</option>
=======
                    <option value="{{ $kategori->id }}" @selected(old('kategori_id', $produk->kategori_id) == $kategori->id)>{{ $kategori->nama_kategori }}</option>
>>>>>>> 7852ec3e701ca6a29b3a612aa59e0de9ddcd5cb7
                @endforeach
            </select>
        </div>
        <div class="mb-3"><label for="kode_produk" class="form-label">Kode Produk</label><input id="kode_produk" name="kode_produk" class="form-control" value="{{ old('kode_produk', $produk->kode_produk) }}" required maxlength="255"></div>
        <div class="mb-3"><label for="nama_produk" class="form-label">Nama Produk</label><input id="nama_produk" name="nama_produk" class="form-control" value="{{ old('nama_produk', $produk->nama_produk) }}" required maxlength="255"></div>
        <div class="row"><div class="col-md-6 mb-3"><label for="harga" class="form-label">Harga (Rp)</label><input id="harga" type="number" name="harga" class="form-control" value="{{ old('harga', $produk->harga) }}" min="0" required></div>
        <div class="col-md-6 mb-3"><label for="stok" class="form-label">Stok</label><input id="stok" type="number" name="stok" class="form-control" value="{{ old('stok', $produk->stok) }}" min="0" required></div></div>
        <button class="btn btn-primary">Simpan Perubahan</button> <a href="{{ route('produk.index') }}" class="btn btn-outline-secondary">Kembali</a>
    </form>
</div></div>
@endsection
