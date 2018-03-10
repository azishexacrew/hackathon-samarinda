<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User ;

class RegisterController extends Controller
{
    public function index(){
      return view('register.index');
    }

    public function store(){
      $user = new User;

      $user->nama = request('nama');
      $user->password = bcrypt(request('password'));
      $user->email = request('email');
      $user->username= request('username');
      $user->hp = request('hp');
      $user->jenis_kelamin = request('jenis_kelamin');
      $user->alamat = request('alamat');
      $user->save();

      if ($user) {
        $note = 'registerasi telah berhasil';
      }else{
        $note = 'registerasi gagal';
      }

      return redirect()->route('registerr.index',['note' => $note]);
    }
}
