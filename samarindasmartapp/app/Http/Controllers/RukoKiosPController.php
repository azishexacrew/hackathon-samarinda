<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ruko;
use App\Kios;

class RukoKiosPController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function getIndex()
    {
    	$rukos = Ruko::orderBy('created_at', 'desc')->paginate(5);
    	$kios = Kios::orderBy('created_at', 'desc')->paginate(5);
    	return view('pengguna.Rukokios.index')->withRukos($rukos)->withKios($kios);
    }

    public function getdataPenyewa()
    {
    	return view('pengguna.datapenyewarukokios');
    }

    public function bacaRuko($slug)
    {
    	$ruko = Ruko::where('slug', '=', $slug)->first();
    	return view('pengguna.bacaRuko')->withRuko($ruko);
    }

    public function bacaKios($slug)
    {
    	$kios = Kios::where('slug', '=', $slug)->first();
    	return view('pengguna.bacaKios')->withKios($kios);
    }
}
