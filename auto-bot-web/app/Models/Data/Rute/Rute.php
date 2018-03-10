<?php

namespace App\Models\Data\Rute;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;

class Rute extends Model
{
    use Uuids;
    public $incrementing = false;

    public $table = 'rutes';
    public $fillable = ['nama', 'time', 'date', 'user_id', 'status'];
}
