<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

class LoginController extends Controller
{
    public function index(){
      if (!request('note')) {
        session()->forget('note');
      }
      return view('login.index');
    }

    public function store(){
      if (Auth::attempt(['nama' => request('nama'),'password' => request('password')])) {
        return redirect()->route('landingpage');
      }else{
        return redirect()->route('loginn.index');
      }
    }
}
