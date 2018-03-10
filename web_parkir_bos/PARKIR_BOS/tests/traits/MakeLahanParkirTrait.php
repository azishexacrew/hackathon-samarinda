<?php

use Faker\Factory as Faker;
use App\Models\LahanParkir;
use App\Repositories\LahanParkirRepository;

trait MakeLahanParkirTrait
{
    /**
     * Create fake instance of LahanParkir and save it in database
     *
     * @param array $lahanParkirFields
     * @return LahanParkir
     */
    public function makeLahanParkir($lahanParkirFields = [])
    {
        /** @var LahanParkirRepository $lahanParkirRepo */
        $lahanParkirRepo = App::make(LahanParkirRepository::class);
        $theme = $this->fakeLahanParkirData($lahanParkirFields);
        return $lahanParkirRepo->create($theme);
    }

    /**
     * Get fake instance of LahanParkir
     *
     * @param array $lahanParkirFields
     * @return LahanParkir
     */
    public function fakeLahanParkir($lahanParkirFields = [])
    {
        return new LahanParkir($this->fakeLahanParkirData($lahanParkirFields));
    }

    /**
     * Get fake data of LahanParkir
     *
     * @param array $postFields
     * @return array
     */
    public function fakeLahanParkirData($lahanParkirFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'jenis_kendaraan_id' => $fake->randomDigitNotNull,
            'nama' => $fake->word,
            'longitude' => $fake->word,
            'latitude' => $fake->word,
            'jumlah' => $fake->randomDigitNotNull,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $lahanParkirFields);
    }
}
