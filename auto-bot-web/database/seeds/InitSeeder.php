<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Profil;
use App\Models\Data\Tps;

class InitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->trucated();
        $this->userCreate();
        $this->tpsCreate();
    }

    protected function trucated()
    {
        User::truncate();
        Profil::truncate();
        Tps::truncate();
    }

    protected function userCreate(){
        $user = new User;

        $user->name = 'Super Admin';
        $user->email = 'my@auto-bot.online';
        $user->rule = 'superadmin';
        $user->password = bcrypt('asdasd');

        $user->save();
        $this->profilCreate($user->id);
    }

    protected function profilCreate($id){
        Profil::create([
            'NIK' => '',
            'users_id' => $id,
            'address' => '',
            'kecamatan' => '',
            'kelurahan' => '',
            'rt' => '',
            'lat' => '',
            'lng' => '',
        ]);
    }

    protected function tpsCreate(){
        Tps::create([
            'nama' => 'TPS Danau Jempang',
            'address' => 'Jalan Danau Jempang',
            'kecamatan' => 'Samarinda Kota',
            'kelurahan' => 'Sungai Pinang Luar',
            'lat' => '-0.4948406',
            'lng' => '117.1539942 ',
        ]);

        Tps::create([
            'nama' => 'TPS Lambung',
            'address' => 'Jalan Lambung Mangkurat',
            'kecamatan' => 'Samarinda Kota',
            'kelurahan' => 'Sungai Pinang Luar',
            'lat' => '-0.4892072',
            'lng' => '117.1602504',
        ]);

        Tps::create([
            'nama' => 'TPS Merdeka',
            'address' => 'Jalan Merdeka',
            'kecamatan' => 'Samarinda Kota',
            'kelurahan' => 'Sungai Pinang Luar',
            'lat' => '-0.4883649',
            'lng' => '117.1643163',
        ]);
    }
}
