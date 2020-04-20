<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $guarded = [];
    protected $table = 'pelanggan';

    public function penyewaan()
    {
        return $this->hasMany(Penyewaan::class);
    }
}
