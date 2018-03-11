<?php

use Illuminate\Database\Seeder;

use DB ;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
          'nama' => 'nata',
          'username' => 'haidi20',
          'password' => bcrypt('samarinda'),
          'email' => 'nhaidii@yahoo.com'
        ]);
    }
}
