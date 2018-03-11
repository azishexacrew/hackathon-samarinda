<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\API\Kecamatan;

use App\Models\Tenant;

class TenantController extends Controller
{
    public function __construct(Kecamatan $kecamatan){
      $this->kecamatan = $kecamatan ;
    }

    public function create(){
      $kec = $this->kecamatan->index();

      return view('tenant.form',compact('kec'));
    }

    public function konfirmasi (){
      return view('tenant.konfirmasi');
    }

    public function detail (){
      $id = request('tenant_id');
      $tenant = Tenant::find($id);
      $kec = $this->kecamatan->index() ;
      return view('tenant.detail',compact('tenant','kec'));
    }

    public function store(){
      $tenant = new Tenant;

      $tenant->nama = request('nama');
      $tenant->penjelasan = request('penjelasan');
      $tenant->kecamatan = request('kecamatan');
      $tenant->alamat = request('alamat');
      $tenant->kontak = request('kontak');

      if (request()->file('gambar')) {
        @unlink(public_path('image/' . $tenant->gambar));
          $file           = request()->file('gambar');
          $extension      = $file->getClientOriginalExtension();
          $fileName       = str_random(8) . '.' . $extension;
          request()->file('gambar')->move("image/", $fileName);
      }
      $tenant->gambar    = $fileName;

      $tenant->save();

      if ($tenant) {
        return redirect()->route('tenant.konfirmasi',['tenant_id' => $tenant->id]);
      }
    }
}
