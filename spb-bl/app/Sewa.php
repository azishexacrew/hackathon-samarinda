<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sewa extends Model
{
    protected $table = 'sewa';

    public function pemilik()
    {
      return $this->belongsTo(\App\User::class);
    }

    public function tenant()
    {
      return $this->belongsTo(\App\PemilikTenant::class);
    }

    public function penyewa()
    {
      return $this->belongsTo(\App\Penyewa::class);
    }
}
