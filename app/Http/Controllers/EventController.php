<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Event ;

class EventController extends Controller
{
    public function index(){
      return view('event.index');
    }

    public function store(){
      $event = new Event ;

      $event->nama = request('nama');
      $event->penjelasan = request('penjelasan');
      $event->alamat = request('alamat');
      $event->bentuk_tenant = request('bentuk_tenant');
      $event->rekening = request('rekening');
      $event->nama_rekening = request('nama_rekening');

      if (request()->file('gambar')) {
        @unlink(public_path('image/' . $event->foto));
          $file           = request()->file('gambar');
          $extension      = $file->getClientOriginalExtension();
          $fileName       = str_random(8) . '.' . $extension;
          request()->file('gambar')->move("image/", $fileName);
          $event->gambar    = $fileName;
      }

      $event->save();

      if ($event) {
          return 'berhasil';
      }else{
          return 'gagal';
      }
    }
}
