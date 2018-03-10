<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

 use App\API\Provinsi ;

class LandingController extends Controller
{
    public function __construct(Provinsi $pro){
      $this->provinsi = $pro ;
    }

    public function index(){
      return view('landing.index');
    }

    public function provinsi(){
      return $this->provinsi->index() ;
    }
}
