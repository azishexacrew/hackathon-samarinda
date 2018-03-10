<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Profil;

class UsersTableSeeder extends Seeder
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
    }

    protected function trucated()
    {
        User::truncate();
        Profil::truncate();
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
}
