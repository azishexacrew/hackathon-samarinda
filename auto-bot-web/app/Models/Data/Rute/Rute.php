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

    public function Angkutan()
    {
        return $this->belongsTo('App\Models\Data\Angkutan', 'angkutans_id');
    }

    public function Rutedetail()
    {
        return $this->hasMany('App\Models\Data\Rute\Rutedetail', 'rutes_id', 'id');
    }

    public function Rutetrack()
    {
        return $this->hasOne('App\Models\Data\Rute\Rutetrack', 'rutes_id', 'id');
    }
}
