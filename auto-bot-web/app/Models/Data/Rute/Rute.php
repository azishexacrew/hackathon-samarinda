<?php

namespace App\Models\Data\Rute;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;

class Rute extends Model
{
    use Uuids;
    public $incrementing = false;

    protected $table = 'rutes';
    protected $fillable = ['nama', 'time', 'date', 'users_id', 'status'];

    public function User()
    {
        return $this->belongsTo('App\Models\User', 'users_id');
    }
}
