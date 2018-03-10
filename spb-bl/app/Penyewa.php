<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penyewa extends Model
{
    protected $table = 'penyewa';

    public function Sewa()
    {
      return $this->belongsTo(\App\Sewa::class);
    }
}
