<?php

namespace App\Models\Data\Rute;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;

class Rutedetail extends Model
{
    use Uuids;
    public $incrementing = false;

    protected $table = 'rutedetails';
    protected $fillable = ['rute_id', 'tps', 'status'];

    public function Rute()
    {
        return $this->belongsTo('App\Models\Data\Rute\Rute', 'rute_id');
    }

    public function Tps()
    {
        return $this->belongsTo('App\Models\Data\Tps', 'tps_id');
    }
}
