<?php

use Faker\Factory as Faker;
use App\Models\DataKendaraan;
use App\Repositories\DataKendaraanRepository;

trait MakeDataKendaraanTrait
{
    /**
     * Create fake instance of DataKendaraan and save it in database
     *
     * @param array $dataKendaraanFields
     * @return DataKendaraan
     */
    public function makeDataKendaraan($dataKendaraanFields = [])
    {
        /** @var DataKendaraanRepository $dataKendaraanRepo */
        $dataKendaraanRepo = App::make(DataKendaraanRepository::class);
        $theme = $this->fakeDataKendaraanData($dataKendaraanFields);
        return $dataKendaraanRepo->create($theme);
    }

    /**
     * Get fake instance of DataKendaraan
     *
     * @param array $dataKendaraanFields
     * @return DataKendaraan
     */
    public function fakeDataKendaraan($dataKendaraanFields = [])
    {
        return new DataKendaraan($this->fakeDataKendaraanData($dataKendaraanFields));
    }

    /**
     * Get fake data of DataKendaraan
     *
     * @param array $postFields
     * @return array
     */
    public function fakeDataKendaraanData($dataKendaraanFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'users_id' => $fake->randomDigitNotNull,
            'no_polisi' => $fake->randomDigitNotNull,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'jenis_kendaraan_id' => $fake->randomDigitNotNull
        ], $dataKendaraanFields);
    }
}
