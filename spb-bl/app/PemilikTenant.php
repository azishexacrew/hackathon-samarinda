<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;

class PemilikTenant extends Model
{
    protected $table = 'tenant';

    public function user()
    {
      return $this->belongsTo(\App\User::class);
    }

    public function pemiliku()
    {
      return $this->belongsTo(\App\Pemilik::class);
    }

    public function Sewa()
    {
      return $this->belongsTo(\App\Sewa::class);
    }
}
