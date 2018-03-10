<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = "event";

    public function user(){
      return $this->hasOne('App\User');
    }
}
