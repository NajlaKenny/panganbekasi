<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Harga extends Model
{
    protected $table = 'harga_komoditas';
    protected $fillable = [
        'komoditas_id',
        'harga',
        'tanggal'
    ];

    public function komoditas()
    {
        return $this->belongsTo(Komoditas::class);
    }
}