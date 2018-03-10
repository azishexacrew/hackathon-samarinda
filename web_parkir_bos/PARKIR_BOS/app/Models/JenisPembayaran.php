<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class JenisPembayaran
 * @package App\Models
 * @version March 9, 2018, 10:04 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection dataKendaraan
 * @property \Illuminate\Database\Eloquent\Collection permissionRole
 * @property \Illuminate\Database\Eloquent\Collection permissionRoleJukir
 * @property \Illuminate\Database\Eloquent\Collection roleUser
 * @property \Illuminate\Database\Eloquent\Collection roleUserJukir
 * @property \Illuminate\Database\Eloquent\Collection Transaksi
 * @property string nama
 * @property string keterangan
 */
class JenisPembayaran extends Model
{
    use SoftDeletes;

    public $table = 'jenis_pembayaran';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'nama',
        'keterangan'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nama' => 'string',
        'keterangan' => 'string'
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
    public function transaksis()
    {
        return $this->hasMany(\App\Models\Transaksi::class);
    }
}
