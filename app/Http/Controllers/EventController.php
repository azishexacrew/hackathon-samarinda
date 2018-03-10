<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Event ;

class EventController extends Controller
{
    public function index(){
      return view('event.index');
    }

    public function generate(){
      $kunci = request('kunci');
      return view('event.generate',compact('kunci'));
    }

    public function store(){
      $event = new Event ;
      $event->nama = request('nama');
      $event->kunci = $this->random();
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
          return redirect()->route('event.generate',['kunci' => $event->kunci]);
      }else{
          return 'gagal';
      }
    }

    public function random(){
        $random = substr(md5(microtime()),rand(1,26),5);
        return $random ;
    }
}
