<?php

use Faker\Factory as Faker;
use App\Models\JenisKendaraan;
use App\Repositories\JenisKendaraanRepository;

trait MakeJenisKendaraanTrait
{
    /**
     * Create fake instance of JenisKendaraan and save it in database
     *
     * @param array $jenisKendaraanFields
     * @return JenisKendaraan
     */
    public function makeJenisKendaraan($jenisKendaraanFields = [])
    {
        /** @var JenisKendaraanRepository $jenisKendaraanRepo */
        $jenisKendaraanRepo = App::make(JenisKendaraanRepository::class);
        $theme = $this->fakeJenisKendaraanData($jenisKendaraanFields);
        return $jenisKendaraanRepo->create($theme);
    }

    /**
     * Get fake instance of JenisKendaraan
     *
     * @param array $jenisKendaraanFields
     * @return JenisKendaraan
     */
    public function fakeJenisKendaraan($jenisKendaraanFields = [])
    {
        return new JenisKendaraan($this->fakeJenisKendaraanData($jenisKendaraanFields));
    }

    /**
     * Get fake data of JenisKendaraan
     *
     * @param array $postFields
     * @return array
     */
    public function fakeJenisKendaraanData($jenisKendaraanFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'jenis' => $fake->word,
            'tarif_awal' => $fake->randomDigitNotNull,
            'tarif_jam' => $fake->randomDigitNotNull,
            'tarif_max' => $fake->randomDigitNotNull,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s')
        ], $jenisKendaraanFields);
    }
}
