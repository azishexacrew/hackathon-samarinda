<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User ;

class RegisterController extends Controller
{
    public function index(){
      if (!request('note')) {
        session()->forget('note');
      }
      return view('register.index');
    }

    public function store(){
      $user = new User;

      // $this->validate(request(),[
      //   'name' => 'required',
      //   'email' => 'required|email',
      //   'username' => 'required',
      //   'hp' => 'required|numeric',
      //   'jenis_kelamin' => 'required',
      //   'alamat' => 'required'
      // ]);

      $user->nama = request('name');
      $user->password = bcrypt(request('password'));
      $user->email = request('email');
      $user->username= request('username');
      $user->hp = request('hp');
      $user->jenis_kelamin = request('jenis_kelamin');
      $user->alamat = request('alamat');
      $user->save();

      if ($user) {
        session()->put('note','berhasil');
        return redirect()->route('loginn.index',['note' => 'berhasil']);
      }

      return redirect()->route('registerr.index',['note' => true]);
    }
}
