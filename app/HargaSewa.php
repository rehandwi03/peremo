<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HargaSewa extends Model
{
    protected $table = 'harga_sewa';
    protected $guarded = [];
    protected $casts = [
        'tarif_sewa' => 'integer',
    ];
    public function mobil()
    {
        return $this->belongsTo(Mobil::class);
    }

    public function penyewaan()
    {
        return $this->hasMany(Penyewaan::class);
    }
}
