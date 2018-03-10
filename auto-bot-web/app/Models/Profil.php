<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;

class Profil extends Model
{
    use Uuids;
    protected $table = 'profil';
    public $incrementing = false;
}
