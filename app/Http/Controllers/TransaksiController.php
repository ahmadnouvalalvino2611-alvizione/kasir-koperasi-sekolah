<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Produk;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksis = Transaksi::with(['produk', 'pelanggan'])->latest('tanggal')->paginate(10);
        return view('transaksi.index', compact('transaksis'));
    }

    public function create()
    {
        return view('transaksi.create', [
            'produks' => Produk::orderBy('nama_produk')->get(),
            'pelanggans' => Pelanggan::orderBy('nama_pelanggan')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'produk_id' => ['required', 'exists:produk,id'],
            'pelanggan_id' => ['required', 'exists:pelanggan,id'],
            'tanggal' => ['required', 'date'],
            'jumlah' => ['required', 'integer', 'min:1'],
        ]);

        DB::transaction(function () use ($data): void {
            $produk = Produk::whereKey($data['produk_id'])->lockForUpdate()->firstOrFail();
            if ($data['jumlah'] > $produk->stok) {
                throw ValidationException::withMessages([
                    'jumlah' => 'Jumlah pembelian melebihi stok yang tersedia (' . $produk->stok . ').',
                ]);
            }

            $total = $produk->harga * $data['jumlah'];
            Transaksi::create([
                'produk_id' => $produk->id,
                'pelanggan_id' => $data['pelanggan_id'],
                'tanggal' => $data['tanggal'],
                'jumlah' => $data['jumlah'],
                'total' => $total,
            ]);
            $produk->decrement('stok', $data['jumlah']);
        });

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil disimpan.');
    }

    public function edit(Transaksi $transaksi)
    {
        return view('transaksi.edit', [
            'transaksi' => $transaksi->load(['produk', 'pelanggan']),
            'produks' => Produk::orderBy('nama_produk')->get(),
            'pelanggans' => Pelanggan::orderBy('nama_pelanggan')->get(),
        ]);
    }

    public function update(Request $request, Transaksi $transaksi)
    {
        $data = $request->validate([
            'produk_id' => ['required', 'exists:produk,id'],
            'pelanggan_id' => ['required', 'exists:pelanggan,id'],
            'tanggal' => ['required', 'date'],
            'jumlah' => ['required', 'integer', 'min:1'],
        ]);

        DB::transaction(function () use ($data, $transaksi): void {
            $locked = Produk::whereIn('id', [$transaksi->produk_id, $data['produk_id']])
                ->orderBy('id')->lockForUpdate()->get()->keyBy('id');
            $produkLama = $locked->get($transaksi->produk_id);
            $produkBaru = $locked->get($data['produk_id']);

            if ($produkLama === null || $produkBaru === null) {
                throw ValidationException::withMessages(['produk_id' => 'Produk tidak ditemukan.']);
            }
            $stokTersedia = $produkBaru->stok + ($produkLama->is($produkBaru) ? $transaksi->jumlah : 0);
            if ($data['jumlah'] > $stokTersedia) {
                throw ValidationException::withMessages([
                    'jumlah' => 'Jumlah melebihi stok yang tersedia (' . $stokTersedia . ').',
                ]);
            }

            if (! $produkLama->is($produkBaru)) {
                $produkLama->increment('stok', $transaksi->jumlah);
            }
            $produkBaru->decrement('stok', $data['jumlah']);
            $transaksi->update([
                'produk_id' => $produkBaru->id,
                'pelanggan_id' => $data['pelanggan_id'],
                'tanggal' => $data['tanggal'],
                'jumlah' => $data['jumlah'],
                'total' => $produkBaru->harga * $data['jumlah'],
            ]);
        });

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil diperbarui.');
    }

    public function destroy(Transaksi $transaksi)
    {
        DB::transaction(function () use ($transaksi): void {
            $produk = Produk::whereKey($transaksi->produk_id)->lockForUpdate()->firstOrFail();
            $produk->increment('stok', $transaksi->jumlah);
            $transaksi->delete();
        });

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil dihapus dan stok dikembalikan.');
    }
}
