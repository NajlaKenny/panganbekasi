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
        $hargas = Harga::with(['komoditas','pasar'])->latest()->paginate(10);

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
<<<<<<< HEAD
            'pasar' => 'required',
=======
            'pasar_id' => 'required',
>>>>>>> 8093ad7a7730c68ece7e7f445ecd30eb6fe0479e
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
<<<<<<< HEAD
    {
        $komoditas = Komoditas::all();
        $pasars = Pasar::all();

        return view('admin.harga.edit', compact('harga','komoditas','pasars'));
    }
=======
{
    $komoditas = Komoditas::all();
    $pasars = Pasar::all();
>>>>>>> 8093ad7a7730c68ece7e7f445ecd30eb6fe0479e

    return view('admin.harga.edit', compact('harga','komoditas','pasars'));
}
    public function update(Request $request, Harga $harga)
    {
        $request->validate([
            'komoditas_id' => 'required',
<<<<<<< HEAD
            'pasar' => 'required',
=======
            'pasar_id' => 'required',
>>>>>>> 8093ad7a7730c68ece7e7f445ecd30eb6fe0479e
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