<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class DataKendaraan
 * @package App\Models
 * @version March 9, 2018, 9:50 am UTC
 *
 * @property \App\Models\User user
 * @property \App\Models\JenisKendaraan jenisKendaraan
 * @property \Illuminate\Database\Eloquent\Collection permissionRole
 * @property \Illuminate\Database\Eloquent\Collection permissionRoleJukir
 * @property \Illuminate\Database\Eloquent\Collection roleUser
 * @property \Illuminate\Database\Eloquent\Collection roleUserJukir
 * @property \Illuminate\Database\Eloquent\Collection Transaksi
 * @property integer users_id
 * @property integer no_polisi
 * @property integer jenis_kendaraan_id
 */
class DataKendaraan extends Model
{
    use SoftDeletes;

    public $table = 'data_kendaraan';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'users_id',
        'no_polisi',
        'jenis_kendaraan_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'users_id' => 'integer',
        'no_polisi' => 'integer',
        'jenis_kendaraan_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function jenisKendaraan()
    {
        return $this->belongsTo(\App\Models\JenisKendaraan::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function transaksis()
    {
        return $this->hasMany(\App\Models\Transaksi::class);
    }
}
