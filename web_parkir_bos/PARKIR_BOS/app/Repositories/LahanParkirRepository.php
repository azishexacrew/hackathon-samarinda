<?php

namespace App\Repositories;

use App\Models\LahanParkir;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class LahanParkirRepository
 * @package App\Repositories
 * @version March 9, 2018, 10:24 am UTC
 *
 * @method LahanParkir findWithoutFail($id, $columns = ['*'])
 * @method LahanParkir find($id, $columns = ['*'])
 * @method LahanParkir first($columns = ['*'])
*/
class LahanParkirRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'jenis_kendaraan_id',
        'nama',
        'longitude',
        'latitude',
        'jumlah'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return LahanParkir::class;
    }
}
