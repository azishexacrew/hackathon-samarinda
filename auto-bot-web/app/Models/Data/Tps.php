<?php

namespace App\Models\Data;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;

class Tps extends Model
{
    use Uuids;
    public $incrementing = false;

    protected $table = 'tps';
    protected $fillable = ['address', 'kecamatan', 'kelurahan', 'lat', 'lng'];
}
