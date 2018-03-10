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
}
