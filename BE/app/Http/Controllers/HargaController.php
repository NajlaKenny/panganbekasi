<?php

namespace App\Http\Controllers;

use App\Models\Harga;
use App\Models\Komoditas;
use Illuminate\Http\Request;

class HargaController extends Controller
{
    public function index()
    {
        $hargas = Harga::with('komoditas')->latest()->paginate(10);

        return view('admin.harga.index', compact('hargas'));
    }

    public function create()
    {
        $komoditas = Komoditas::all();
        return view('admin.harga.create', compact('komoditas'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'komoditas_id' => 'required',
            'harga' => 'required|numeric',
            'tanggal' => 'required|date',
        ]);

        Harga::create($validated);

        return redirect()->route('harga.index')
            ->with('success', 'Harga berhasil ditambahkan');
    }

    public function edit(Harga $harga)
    {
        $komoditas = Komoditas::all();
        return view('admin.harga.edit', compact('harga', 'komoditas'));
    }

    public function update(Request $request, Harga $harga)
    {
        $validated = $request->validate([
            'komoditas_id' => 'required',
            'harga' => 'required|numeric',
            'tanggal' => 'required|date',
        ]);

        $harga->update($validated);

        return redirect()->route('harga.index')
            ->with('success', 'Harga berhasil diupdate');
    }

    public function destroy(Harga $harga)
    {
        $harga->delete();

        return redirect()->route('harga.index')
            ->with('success', 'Harga berhasil dihapus');
    }
}