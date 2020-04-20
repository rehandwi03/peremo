<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    protected $table = 'mobil';
    protected $guarded = [];

    public function merek()
    {
        return $this->belongsTo(Merek::class);
    }
    public function harga_sewa()
    {
        return $this->belongsTo(HargaSewa::class);
    }
    public function penyewaan()
    {
        return $this->hasMany(Penyewaan::class);
    }
}
