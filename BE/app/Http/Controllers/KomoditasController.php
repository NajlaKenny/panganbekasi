<?php

namespace App\Http\Controllers;

use App\Models\Komoditas;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KomoditasController extends Controller
{
    /**
     * Menampilkan daftar komoditas
     */
    public function index()
    {
        $komoditas = Komoditas::with('kategori')
            ->latest()
            ->paginate(10);

        return view('admin.komoditas.index', compact('komoditas'));
    }

    /**
     * Form tambah komoditas
     */
    public function create()
    {
        $kategoris = Kategori::all();

        return view('admin.komoditas.create', compact('kategoris'));
    }

    /**
     * Simpan komoditas
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategoris,id',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('komoditas','public');
        }

        Komoditas::create($validated);

        return redirect()
            ->route('komoditas.index')
            ->with('success','Data berhasil ditambahkan');
    }

    /**
     * Form edit
     */
    public function edit(Komoditas $komoditas)
    {
        $kategoris = Kategori::all();

        return view('admin.komoditas.edit', compact('komoditas','kategoris'));
    }

    /**
     * Update komoditas
     */
    public function update(Request $request, Komoditas $komoditas)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategoris,id',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('komoditas','public');
        }

        $komoditas->update($validated);

        return redirect()
            ->route('komoditas.index')
            ->with('success', 'Data komoditas berhasil diperbarui');
    }

    /**
     * Hapus komoditas
     */
    public function destroy(Komoditas $komoditas)
    {
        $komoditas->delete();

        return redirect()
            ->route('komoditas.index')
            ->with('success', 'Data komoditas berhasil dihapus');
    }
}