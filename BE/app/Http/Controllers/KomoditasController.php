<?php

namespace App\Http\Controllers;

use App\Models\Komoditas;
use Illuminate\Http\Request;

class KomoditasController extends Controller
{
    /**
     * Tampilkan daftar data barang
     */
    public function index()
    {
        $komoditas = Komoditas::latest()->paginate(10);

        return view('admin.komoditas.index', compact('komoditas'));
    }

    /**
     * Tampilkan form tambah data
     */
    public function create()
    {
        return view('admin.komoditas.create');
    }

    /**
     * Simpan data baru
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255'
        ]);

        Komoditas::create($validated);

        return redirect()
            ->route('komoditas.index')
            ->with('success', 'Data Barang berhasil ditambahkan');
    }

    /**
     * Tampilkan form edit
     */
    public function edit(Komoditas $komoditas)
{
    return view('admin.komoditas.edit', compact('komoditas'));
}

    /**
     * Update data
     */
    public function update(Request $request, Komoditas $komoditas)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255'
        ]);

        $komoditas->update($validated);

        return redirect()
            ->route('komoditas.index')
            ->with('success', 'Data Barang berhasil diupdate');
    }

    /**
     * Hapus data
     */
    public function destroy(Komoditas $komoditas)
    {
        $komoditas->delete();

        return redirect()
            ->route('komoditas.index')
            ->with('success', 'Data Barang berhasil dihapus');
    }
}