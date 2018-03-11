<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kios extends Model
{
    protected $table = 'kios';
    public function SewaRuko()
    {
    	return $this->hasMany('App\SewaRuko');
    }
}
