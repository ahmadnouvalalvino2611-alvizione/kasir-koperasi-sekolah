@extends('layouts.app')
@section('title', 'Daftar Transaksi')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3 mb-0">Daftar Transaksi</h1>
    <a href="{{ route('transaksi.create') }}" class="btn btn-primary">Tambah Transaksi</a>
</div>
<div class="card"><div class="card-body table-responsive">
    <table class="table table-striped table-hover align-middle mb-0">
        <thead><tr><th>No.</th><th>Tanggal</th><th>Produk</th><th>Pelanggan</th><th>Jumlah</th><th>Total</th><th>Aksi</th></tr></thead>
        <tbody>
        @forelse ($transaksis as $item)
            <tr>
                <td>{{ $transaksis->firstItem() + $loop->index }}</td>
                <td>{{ $item->tanggal->format('d-m-Y') }}</td>
                <td>{{ $item->produk->nama_produk ?? 'Produk dihapus' }}</td>
                <td>{{ $item->pelanggan->nama_pelanggan ?? 'Pelanggan dihapus' }}</td>
                <td>{{ $item->jumlah }}</td>
                <td>Rp {{ number_format($item->total, 0, ',', '.') }}</td>
                <td class="text-nowrap">
                    <a href="{{ route('transaksi.edit', $item) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('transaksi.destroy', $item) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus transaksi dan kembalikan stok?')">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="7" class="text-center text-muted">Belum ada transaksi.</td></tr>
        @endforelse
        </tbody>
    </table>
    {{ $transaksis->links() }}
</div></div>
@endsection
