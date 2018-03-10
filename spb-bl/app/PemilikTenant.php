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
}
