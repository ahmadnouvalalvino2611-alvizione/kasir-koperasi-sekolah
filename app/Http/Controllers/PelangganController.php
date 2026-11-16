<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PelangganController extends Controller
{
    public function index(Request $request): View
    {
        $search = trim((string) $request->input('search', ''));

        $pelanggan = Pelanggan::query()
            ->when($search !== '', function ($query) use ($search) {
                $query->where(function ($query) use ($search) {
                    $query->where('nama', 'like', "%{$search}%")
                        ->orWhere('no_hp', 'like', "%{$search}%");
                });
            })
            ->orderBy('nama')
            ->paginate(10)
            ->withQueryString();

        return view('pelanggan.index', compact('pelanggan', 'search'));
    }

    public function create(): View
    {
        return view('pelanggan.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'tipe' => ['required', 'in:siswa,guru,umum'],
            'no_hp' => ['required', 'string', 'max:255'],
        ]);

        Pelanggan::create($validated);

        return redirect()
            ->route('pelanggan.index')
            ->with('success', 'Pelanggan berhasil ditambahkan.');
    }

    public function edit(Pelanggan $pelanggan): View
    {
        return view('pelanggan.edit', compact('pelanggan'));
    }

    public function update(Request $request, Pelanggan $pelanggan): RedirectResponse
    {
        $validated = $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'tipe' => ['required', 'in:siswa,guru,umum'],
            'no_hp' => ['required', 'string', 'max:255'],
        ]);

        $pelanggan->update($validated);

        return redirect()
            ->route('pelanggan.index')
            ->with('success', 'Data pelanggan berhasil diperbarui.');
    }

    public function destroy(Pelanggan $pelanggan): RedirectResponse
    {
        $pelanggan->delete();

        return redirect()
            ->route('pelanggan.index')
            ->with('success', 'Pelanggan berhasil dihapus.');
    }
}
