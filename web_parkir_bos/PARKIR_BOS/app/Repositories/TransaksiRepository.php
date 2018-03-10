<?php

namespace App\Repositories;

use App\Models\Transaksi;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class TransaksiRepository
 * @package App\Repositories
 * @version March 9, 2018, 10:27 am UTC
 *
 * @method Transaksi findWithoutFail($id, $columns = ['*'])
 * @method Transaksi find($id, $columns = ['*'])
 * @method Transaksi first($columns = ['*'])
*/
class TransaksiRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'check_out',
        'user_jukir_id',
        'data_kendaraan_id',
        'lahan_parkir_id',
        'jenis_pembayaran_id',
        'total'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Transaksi::class;
    }
}
