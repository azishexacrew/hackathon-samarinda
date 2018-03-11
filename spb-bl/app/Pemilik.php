<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemilik extends Model
{
    protected $table = 'pemilik';

    public function Sewa()
    {
      return $this->belongsTo(\App\Sewa::class);
    }

}
