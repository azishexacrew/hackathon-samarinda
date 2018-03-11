<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class PembayaranController extends Controller
{
    public function create(){
      $user = User::find(request('user_id'));

      return view('pembayaran.carabayar',compact('user'));
    }

    public function konfirmasi(){
      return view('pembayaran.konfirmasibayar');
    }
}
