<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class LahanParkir
 * @package App\Models
 * @version March 9, 2018, 10:24 am UTC
 *
 * @property \App\Models\JenisKendaraan jenisKendaraan
 * @property \Illuminate\Database\Eloquent\Collection dataKendaraan
 * @property \Illuminate\Database\Eloquent\Collection permissionRole
 * @property \Illuminate\Database\Eloquent\Collection permissionRoleJukir
 * @property \Illuminate\Database\Eloquent\Collection roleUser
 * @property \Illuminate\Database\Eloquent\Collection roleUserJukir
 * @property \Illuminate\Database\Eloquent\Collection Transaksi
 * @property integer jenis_kendaraan_id
 * @property string nama
 * @property decimal longitude
 * @property decimal latitude
 * @property integer jumlah
 */
class LahanParkir extends Model
{
    use SoftDeletes;

    public $table = 'lahan_parkir';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'jenis_kendaraan_id',
        'nama',
        'longitude',
        'latitude',
        'jumlah'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'jenis_kendaraan_id' => 'integer',
        'nama' => 'string',
        'jumlah' => 'integer'
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
