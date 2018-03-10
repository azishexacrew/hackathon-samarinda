<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\User;
use App\Rolse;

class RegisterController extends Controller
{
    public function getRegister()
   	{
   		return view('Register.register');
   	}

   	public function postRegister()
   	{
   		$user = new User();
   		$user->name = Input::get('name');
   		$user->email = Input::get('email');
   		$user->password = bcrypt(Input::get('passsword'));
   		$user->roles_id = DB::table('roles')->select('id')->where('namaRule','user')->first();

   		$user->save();
   	}
}
