<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Transaksi
 * @package App\Models
 * @version March 9, 2018, 10:27 am UTC
 *
 * @property \App\Models\DataKendaraan dataKendaraan
 * @property \App\Models\JenisPembayaran jenisPembayaran
 * @property \App\Models\LahanParkir lahanParkir
 * @property \App\Models\User user
 * @property \Illuminate\Database\Eloquent\Collection dataKendaraan
 * @property \Illuminate\Database\Eloquent\Collection permissionRole
 * @property \Illuminate\Database\Eloquent\Collection permissionRoleJukir
 * @property \Illuminate\Database\Eloquent\Collection roleUser
 * @property \Illuminate\Database\Eloquent\Collection roleUserJukir
 * @property string|\Carbon\Carbon check_out
 * @property integer user_jukir_id
 * @property integer data_kendaraan_id
 * @property integer lahan_parkir_id
 * @property integer jenis_pembayaran_id
 * @property integer total
 */
class Transaksi extends Model
{
    use SoftDeletes;

    public $table = 'transaksi';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'check_out',
        'user_jukir_id',
        'data_kendaraan_id',
        'lahan_parkir_id',
        'jenis_pembayaran_id',
        'total'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_jukir_id' => 'integer',
        'data_kendaraan_id' => 'integer',
        'lahan_parkir_id' => 'integer',
        'jenis_pembayaran_id' => 'integer',
        'total' => 'integer'
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
    public function dataKendaraan()
    {
        return $this->belongsTo(\App\Models\DataKendaraan::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function jenisPembayaran()
    {
        return $this->belongsTo(\App\Models\JenisPembayaran::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function lahanParkir()
    {
        return $this->belongsTo(\App\Models\LahanParkir::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
