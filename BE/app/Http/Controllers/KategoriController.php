<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Tampilkan daftar kategori
     */
    public function index()
    {
        $kategoris = Kategori::latest()->paginate(10);

        return view('admin.kategori.index', compact('kategoris'));
    }

    /**
     * Form tambah kategori
     */
    public function create()
    {
        return view('admin.kategori.create');
    }

    /**
     * Simpan kategori baru
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255'
        ]);

        Kategori::create($validated);

        return redirect()
<<<<<<< HEAD
            ->route('kategori.index') 
=======
            ->route('kategori.index')
>>>>>>> 8093ad7a7730c68ece7e7f445ecd30eb6fe0479e
            ->with('success', 'Kategori berhasil ditambahkan');
    }

    /**
     * Form edit kategori
     */
    public function edit(Kategori $kategori)
    {
        return view('admin.kategori.edit', compact('kategori'));
    }

    /**
     * Update kategori
     */
    public function update(Request $request, Kategori $kategori)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255'
        ]);

        $kategori->update($validated);

        return redirect()
<<<<<<< HEAD
            ->route('kategori.index') 
            ->with('success', 'Kategori berhasil diupdate');
=======
            ->route('kategori.index')
            ->with('success', 'Kategori berhasil diperbarui');
>>>>>>> 8093ad7a7730c68ece7e7f445ecd30eb6fe0479e
    }

    /**
     * Hapus kategori
     */
    public function destroy(Kategori $kategori)
    {
        $kategori->delete();

        return redirect()
<<<<<<< HEAD
            ->route('kategori.index') 
=======
            ->route('kategori.index')
>>>>>>> 8093ad7a7730c68ece7e7f445ecd30eb6fe0479e
            ->with('success', 'Kategori berhasil dihapus');
    }
}