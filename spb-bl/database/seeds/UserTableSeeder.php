<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('users')->truncate();
         User::create([
            'name' => 'Reza Padillah',
            'email'    => 'hello@reza.cloud',
            'password' => bcrypt('suplexcity')
         ]);
    }
}
