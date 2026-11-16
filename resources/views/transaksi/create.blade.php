@extends('layouts.app')
@section('title', 'Tambah Transaksi')
@section('content')
<div class="card"><div class="card-body">
    <h1 class="h3 mb-4">Tambah Transaksi</h1>
    <form action="{{ route('transaksi.store') }}" method="POST">
        @csrf
        <div class="mb-3"><label for="produk_id" class="form-label">Produk</label>
            <select id="produk_id" name="produk_id" class="form-select" required>
                <option value="">Pilih produk</option>
                @foreach ($produks as $produk)
                    <option value="{{ $produk->id }}" @selected(old('produk_id') == $produk->id) @disabled($produk->stok < 1)>
                        {{ $produk->nama_produk }} — Rp {{ number_format($produk->harga, 0, ',', '.') }} — Stok: {{ $produk->stok }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3"><label for="pelanggan_id" class="form-label">Pelanggan</label>
            <select id="pelanggan_id" name="pelanggan_id" class="form-select" required>
                <option value="">Pilih pelanggan</option>
                @foreach ($pelanggans as $pelanggan)
                    <option value="{{ $pelanggan->id }}" @selected(old('pelanggan_id') == $pelanggan->id)>{{ $pelanggan->nama_pelanggan }}</option>
                @endforeach
            </select>
        </div>
        <div class="row"><div class="col-md-6 mb-3"><label for="tanggal" class="form-label">Tanggal</label><input id="tanggal" type="date" name="tanggal" class="form-control" value="{{ old('tanggal', now()->toDateString()) }}" required></div>
        <div class="col-md-6 mb-3"><label for="jumlah" class="form-label">Jumlah</label><input id="jumlah" type="number" name="jumlah" class="form-control" value="{{ old('jumlah', 1) }}" min="1" required></div></div>
        <button class="btn btn-primary">Simpan Transaksi</button> <a href="{{ route('transaksi.index') }}" class="btn btn-outline-secondary">Kembali</a>
    </form>
</div></div>
@endsection
