<?php

namespace App\Repositories;

use App\Models\DataKendaraan;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class DataKendaraanRepository
 * @package App\Repositories
 * @version March 9, 2018, 9:50 am UTC
 *
 * @method DataKendaraan findWithoutFail($id, $columns = ['*'])
 * @method DataKendaraan find($id, $columns = ['*'])
 * @method DataKendaraan first($columns = ['*'])
*/
class DataKendaraanRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'users_id',
        'no_polisi',
        'jenis_kendaraan_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return DataKendaraan::class;
    }
}
