<?php

namespace App\Repositories;

use App\Models\JenisKendaraan;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class JenisKendaraanRepository
 * @package App\Repositories
 * @version March 9, 2018, 9:58 am UTC
 *
 * @method JenisKendaraan findWithoutFail($id, $columns = ['*'])
 * @method JenisKendaraan find($id, $columns = ['*'])
 * @method JenisKendaraan first($columns = ['*'])
*/
class JenisKendaraanRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'jenis',
        'tarif_awal',
        'tarif_jam',
        'tarif_max'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return JenisKendaraan::class;
    }
}
