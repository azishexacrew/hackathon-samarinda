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

    public function store(){
      return request('nama');
    }
}
