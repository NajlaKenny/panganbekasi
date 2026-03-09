<?php

use Illuminate\Support\Facades\Route;
use App\Models\Kategori;
use App\Models\Komoditas;
use App\Models\Harga;
use App\Models\Pasar;


Route::get('/pasars', function () {
    return Pasar::select('id','nama')->get();
});
// ========================
// API KATEGORI
// ========================

Route::get('/kategori', function () {
    return Kategori::all();
});


// ========================
// API KOMODITAS BERDASARKAN KATEGORI
// ========================

Route::get('/komoditas/{kategori}', function ($kategori) {

    return Komoditas::with('harga')
        ->whereHas('kategori', function($q) use ($kategori){
            $q->where('nama', $kategori);
        })
        ->get();

});


// ========================
// API HARGA (FILTER PASAR)
// ========================

Route::get('/harga', function () {

    $pasar = request('pasar');

    return Harga::with('komoditas')
        ->when($pasar, function($q) use ($pasar){
            $q->where('pasar', $pasar);
        })
        ->get();

});