<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Komoditas extends Model
{
    protected $fillable = [
        'nama',
        'kategori_id',
        'gambar'
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function harga()
    {
        return $this->hasMany(Harga::class);
    }
}