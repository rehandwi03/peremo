<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Merek extends Model
{
    protected $table = 'merek';
    protected $guarded = [];

    public function mobil()
    {
        return $this->hasMany(Mobil::class);
    }
}
