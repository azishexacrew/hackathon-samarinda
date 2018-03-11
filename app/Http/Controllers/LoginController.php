<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

class LoginController extends Controller
{
    public function index(){
      return view('login.index');
    }

    public function logout(){
      Auth::logout();
      return redirect()->route('landingpage');
    }

    public function store(){
      if (Auth::attempt(['username' => request('nama'),'password' => request('password')])) {
        return redirect()->route('landingpage');
      }else{
        // session()->put('note','gagal');
        return redirect()->route('loginn.index',['note'=>'gagal']);
      }
    }
}
