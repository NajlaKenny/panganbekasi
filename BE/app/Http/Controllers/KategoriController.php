<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    // tampilkan data kategori
    public function index()
    {
        $kategoris = Kategori::latest()->paginate(10);

        return view('admin.kategori.index', compact('kategoris'));
    }

    // form tambah
    public function create()
    {
        return view('admin.kategori.create');
    }

    // simpan data
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required'
        ]);

        Kategori::create([
            'nama' => $request->nama
        ]);

        return redirect()
            ->route('kategori.index') // ✅ BUKAN admin.kategori.index
            ->with('success', 'Kategori berhasil ditambahkan');
    }

    // form edit
    public function edit(Kategori $kategori)
    {
        return view('admin.kategori.edit', compact('kategori'));
    }

    // update data
    public function update(Request $request, Kategori $kategori)
    {
        $request->validate([
            'nama' => 'required'
        ]);

        $kategori->update([
            'nama' => $request->nama
        ]);

        return redirect()
            ->route('kategori.index') // ✅ BUKAN admin.kategori.index
            ->with('success', 'Kategori berhasil diupdate');
    }

    // hapus data
    public function destroy(Kategori $kategori)
    {
        $kategori->delete();

        return redirect()
            ->route('kategori.index') // ✅ BUKAN admin.kategori.index
            ->with('success', 'Kategori berhasil dihapus');
    }
}