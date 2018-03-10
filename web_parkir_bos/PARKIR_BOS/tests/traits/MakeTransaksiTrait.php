<?php

use Faker\Factory as Faker;
use App\Models\Transaksi;
use App\Repositories\TransaksiRepository;

trait MakeTransaksiTrait
{
    /**
     * Create fake instance of Transaksi and save it in database
     *
     * @param array $transaksiFields
     * @return Transaksi
     */
    public function makeTransaksi($transaksiFields = [])
    {
        /** @var TransaksiRepository $transaksiRepo */
        $transaksiRepo = App::make(TransaksiRepository::class);
        $theme = $this->fakeTransaksiData($transaksiFields);
        return $transaksiRepo->create($theme);
    }

    /**
     * Get fake instance of Transaksi
     *
     * @param array $transaksiFields
     * @return Transaksi
     */
    public function fakeTransaksi($transaksiFields = [])
    {
        return new Transaksi($this->fakeTransaksiData($transaksiFields));
    }

    /**
     * Get fake data of Transaksi
     *
     * @param array $postFields
     * @return array
     */
    public function fakeTransaksiData($transaksiFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'check_out' => $fake->date('Y-m-d H:i:s'),
            'user_jukir_id' => $fake->randomDigitNotNull,
            'data_kendaraan_id' => $fake->randomDigitNotNull,
            'lahan_parkir_id' => $fake->randomDigitNotNull,
            'jenis_pembayaran_id' => $fake->randomDigitNotNull,
            'total' => $fake->randomDigitNotNull,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s')
        ], $transaksiFields);
    }
}
