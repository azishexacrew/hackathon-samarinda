<?php

namespace App\Models\Data;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;

class Angkutan extends Model
{
    use Uuids;
    public $incrementing = false;

    protected $table = 'angkutans';
    protected $fillable = ['nama', 'nomorplat', 'tahunkendaraan', 'type', 'merk', 'warna'];
}
