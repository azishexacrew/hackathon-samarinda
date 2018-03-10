<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class JenisKendaraan
 * @package App\Models
 * @version March 9, 2018, 9:58 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection DataKendaraan
 * @property \Illuminate\Database\Eloquent\Collection LahanParkir
 * @property \Illuminate\Database\Eloquent\Collection permissionRole
 * @property \Illuminate\Database\Eloquent\Collection permissionRoleJukir
 * @property \Illuminate\Database\Eloquent\Collection roleUser
 * @property \Illuminate\Database\Eloquent\Collection roleUserJukir
 * @property string jenis
 * @property integer tarif_awal
 * @property integer tarif_jam
 * @property integer tarif_max
 */
class JenisKendaraan extends Model
{
    use SoftDeletes;

    public $table = 'jenis_kendaraan';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'jenis',
        'tarif_awal',
        'tarif_jam',
        'tarif_max'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'jenis' => 'string',
        'tarif_awal' => 'integer',
        'tarif_jam' => 'integer',
        'tarif_max' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function dataKendaraans()
    {
        return $this->hasMany(\App\Models\DataKendaraan::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function lahanParkirs()
    {
        return $this->hasMany(\App\Models\LahanParkir::class);
    }
}
