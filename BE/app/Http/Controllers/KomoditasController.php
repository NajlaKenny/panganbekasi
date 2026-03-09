<?php

namespace App\Http\Controllers;

use App\Models\Komoditas;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KomoditasController extends Controller
{
    /**
     * Tampilkan daftar data barang
     */
    public function index()
    {
        $komoditas = Komoditas::with('kategori')
                    ->latest()
                    ->paginate(10);

        return view('admin.komoditas.index', compact('komoditas'));
    }


    /**
     * Tampilkan form tambah data
     */
    public function create()
    {
        $kategori = Kategori::all();

        return view('admin.komoditas.create', compact('kategori'));
    }


    /**
     * Simpan data baru + upload gambar
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kategori_id' => 'required',
            'gambar' => 'image|mimes:jpg,png,jpeg|max:2048'
        ]);

        $path = null;

        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('komoditas', 'public');
        }

        Komoditas::create([
            'nama' => $request->nama,
            'kategori_id' => $request->kategori_id,
            'gambar' => $path
        ]);

        return redirect()
            ->route('komoditas.index')
            ->with('success', 'Data Barang berhasil ditambahkan');
    }


    /**
     * Tampilkan form edit
     */
    public function edit(Komoditas $komoditas)
    {
        $kategori = Kategori::all();

        return view(
            'admin.komoditas.edit',
            compact('komoditas', 'kategori')
        );
    }


    /**
     * Update data + optional ganti gambar
     */
    public function update(Request $request, Komoditas $komoditas)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kategori_id' => 'required',
            'gambar' => 'image|mimes:jpg,png,jpeg|max:2048'
        ]);

        $data = [
            'nama' => $request->nama,
            'kategori_id' => $request->kategori_id
        ];

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('komoditas', 'public');
        }

        $komoditas->update($data);

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