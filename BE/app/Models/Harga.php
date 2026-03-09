<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Harga extends Model
{
<<<<<<< HEAD
    protected $table = 'harga';

    protected $fillable = [
        'komoditas_id',
        'pasar',
=======
    protected $table = 'harga_komoditas';

    protected $fillable = [
        'komoditas_id',
        'pasar_id',
>>>>>>> 8093ad7a7730c68ece7e7f445ecd30eb6fe0479e
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