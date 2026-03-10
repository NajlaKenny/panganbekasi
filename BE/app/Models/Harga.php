<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Harga extends Model
{
    protected $table = 'harga_komoditas';

    protected $fillable = [
        'komoditas_id',
        'pasar_id',
        'harga',
        'perubahan'
    ];

    public function komoditas()
    {
        return $this->belongsTo(Komoditas::class);
    }

    public function pasar()
    {
        return $this->belongsTo(Pasar::class);
    }
}