<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;

class Profil extends Model
{
    use Uuids;
    public $incrementing = false;

    protected $table = 'profil';
    protected $fillable = ['users_id', 'NIK', 'address', 'kecamatan', 'kelurahan' ,'rt', 'lat', 'lng'];

    public function User()
    {
        return $this->belongsTo('App\Models\User', 'users_id');
    }
}
