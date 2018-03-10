<?php

namespace App\Models\Data\Rute;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;

class Rutetrack extends Model
{
    use Uuids;
    public $incrementing = false;

    protected $table = 'rutetracks';
    protected $fillable = ['lat', 'lng', 'rute_detail'];

    public function Rutedetail()
    {
        return $this->belongsTo('App\Models\Data\Rute\Rutedetail', 'rute_detail');
    }
}
