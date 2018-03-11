<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SewaKios;
use App\Kios;
use Session;
use Storage;
use Image;
use Purifier;

class SewaKiosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sewakios = SewaKios::all();
        return view('sewaKios.index')->withSewakios($sewakios);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sewaKios = Kios::all();
        return view('sewaKios.create')->withSewaKios($sewaKios);
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
            'kios_id' => 'required|integer',
            ));

        $sewakios = new SewaKios;
        $sewakios->nama = $request->nama;
        $sewakios->alamat = $request->alamat;
        $sewakios->no_hp = $request->no_hp;
        $sewakios->jenis_usaha = $request->jenis_usaha;
        $sewakios->periode_penyewaan = $request->periode_penyewaan;
        $sewakios->kios_id = $request->kios_id;

        $sewakios->save();

        return redirect()->route('sewaKios.show', $sewakios->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sewakios = SewaKios::find($id);
        return view('sewaKios.show')->withSewakios($sewakios);
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
