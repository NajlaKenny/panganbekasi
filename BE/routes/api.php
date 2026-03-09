<?php

use Illuminate\Support\Facades\Route;
use App\Models\Pasar;
use App\Models\Kategori;
use App\Models\Komoditas;
use App\Models\Harga;

Route::get('/dashboard', function () {

    return response()->json([
        'pasars' => Pasar::all(),
        'kategoris' => Kategori::all(),
        'komoditas' => Komoditas::all(),
        'hargas' => Harga::with(['komoditas','pasar'])->get()
    ]);

});