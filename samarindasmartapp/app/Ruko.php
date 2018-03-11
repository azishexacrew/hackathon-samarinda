<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ruko extends Model
{
	protected $table = 'rukos';
    public function sewaruko()
    {
    	return $this->hasMany('App\SewaRuko');
    }
}
