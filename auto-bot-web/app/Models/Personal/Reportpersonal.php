<?php

namespace App\Models\Personal;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;

class Reportpersonal extends Model
{
    use Uuids;
    public $incrementing = false;

    protected $table = 'reportpersonals';
    protected $fillable = ['users_id', 'tps_id', 'qty', 'time', 'date'];

    public function Tps()
    {
        return $this->belongsTo('App\Models\Data\Tps', 'tps_id');
    }

    public function User()
    {
        return $this->belongsTo('App\Models\User', 'users_id');
    }
}
