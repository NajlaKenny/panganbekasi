<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Harga extends Model
{
    protected $table = 'harga';

    protected $fillable = [
        'komoditas_id',
        'pasar',
        'harga',
        'perubahan'
    ];

    public function komoditas()
    {
        return $this->belongsTo(Komoditas::class);
    }
}