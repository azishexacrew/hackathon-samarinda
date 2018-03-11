<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SewaRuko extends Model
{
    public function noruko()
    {
    	return $this->belongsTo('App\Ruko');
    }
}
