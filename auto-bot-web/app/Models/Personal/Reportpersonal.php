<?php

namespace App\Models\Personal;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;

class Reportpersonal extends Model
{
    use Uuids;
    public $incrementing = false;

    protected $table = 'reportpersonals';
}
