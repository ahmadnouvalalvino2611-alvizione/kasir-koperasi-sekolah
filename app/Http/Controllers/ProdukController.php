<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $produks = Produk::with('kategori')->latest()->paginate(10);
        return view('produk.index', compact('produks'));
    }

    public function create()
    {
        $kategoris = Kategori::query()->orderBy('nama')->get();
        return view('produk.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'kategori_id'  => 'required|exists:kategori,id',
            'kode_produk'  => 'required|unique:produk,kode_produk',
            'nama_produk'  => 'required|string|max:255',
            'harga'        => 'required|integer|min:0',
            'stok'         => 'required|integer|min:0',
        ]);

        Produk::create($data);

        return redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan');
    }

    public function edit(Produk $produk)
    {
        $kategoris = Kategori::query()->orderBy('nama')->get();
        return view('produk.edit', compact('produk', 'kategoris'));
    }

    public function update(Request $request, Produk $produk)
    {
        $data = $request->validate([
            'kategori_id'  => 'required|exists:kategori,id',
            'kode_produk'  => 'required|unique:produk,kode_produk,' . $produk->id,
            'nama_produk'  => 'required|string|max:255',
            'harga'        => 'required|integer|min:0',
            'stok'         => 'required|integer|min:0',
        ]);

        $produk->update($data);

        return redirect()->route('produk.index')->with('success', 'Produk berhasil diupdate');
    }

    public function destroy(Produk $produk)
    {
        if ($produk->transaksis()->exists()) {
            return redirect()->route('produk.index')->with('error', 'Produk yang sudah memiliki transaksi tidak dapat dihapus.');
        }

        $produk->delete();
        return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus');
    }
}
