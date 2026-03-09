<?php

namespace App\Http\Controllers;

use App\Models\Harga;
use App\Models\Komoditas;
use App\Models\Pasar;
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
        $pasars = Pasar::all();

        return view('admin.harga.create', compact('komoditas','pasars'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'komoditas_id' => 'required',
            'pasar' => 'required',
            'harga' => 'required|numeric',
        ]);

        Harga::create([
            'komoditas_id' => $request->komoditas_id,
            'pasar' => $request->pasar,
            'harga' => $request->harga,
        ]);

        return redirect()->route('harga.index')
            ->with('success', 'Harga berhasil ditambahkan');
    }

    public function edit(Harga $harga)
    {
        $komoditas = Komoditas::all();
        $pasars = Pasar::all();

        return view('admin.harga.edit', compact('harga','komoditas','pasars'));
    }

    public function update(Request $request, Harga $harga)
    {
        $request->validate([
            'komoditas_id' => 'required',
            'pasar' => 'required',
            'harga' => 'required|numeric',
        ]);

        $harga->update([
            'komoditas_id' => $request->komoditas_id,
            'pasar' => $request->pasar,
            'harga' => $request->harga,
        ]);

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