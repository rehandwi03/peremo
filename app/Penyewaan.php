<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penyewaan extends Model
{
    protected $table = "penyewaan";
    protected $guarded = [];

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class);
    }

    public function mobil()
    {
        return $this->belongsTo(Mobil::class);
    }

    public function harga_sewa()
    {
        return $this->belongsTo(HargaSewa::class);
    }
}
