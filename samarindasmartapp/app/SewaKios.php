<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SewaKios extends Model
{
    public function Kios()
    {
    	return $this->belongsTo('App\Kios');
    }
}
