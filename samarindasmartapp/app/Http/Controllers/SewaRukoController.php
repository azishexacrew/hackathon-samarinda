<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SewaRuko;
use App\Ruko;
use Session;
use Storage;
use Image;
use Purifier;
use Auth;

class SewaRukoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sewaruko = SewaRuko::all();
        return view('sewaRuko.index')->withSewaruko($sewaruko);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sewaRuko = Ruko::all();
        return view('sewaRuko.create')->withSewaRuko($sewaRuko);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            'nama' => 'required|max:255',
            'alamat' => 'required|max:255',
            'no_hp' => 'required',
            'jenis_usaha' => 'required',
            'periode_penyewaan' => 'required',
            'ruko_id' => 'required|integer',
            ));

        $sewaruko = new SewaRuko;
        $sewaruko->nama = $request->nama;
        $sewaruko->alamat = $request->alamat;
        $sewaruko->no_hp = $request->no_hp;
        $sewaruko->jenis_usaha = $request->jenis_usaha;
        $sewaruko->periode_penyewaan = $request->periode_penyewaan;
        $sewaruko->ruko_id = $request->ruko_id;

        Auth::user()->sewaRuko()->save($sewaruko);

        return redirect()->route('sewaRuko.show', $sewaruko->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sewaruko = SewaRuko::find($id);
        return view('sewaRuko.show')->withSewaruko($sewaruko);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
