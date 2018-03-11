<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kios;
use Session;
use Storage;
use Image;
use Purifier;

class KiosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kioss = Kios::orderBy('id', 'desc')->paginate(5);
        return view('kios.index')->withKioss($kioss);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kios.create');
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
            'nomor_kios' => 'required|max:255',
            'blok_kios' => 'required|max:255',
            'slug' => 'required|alpha_dash|min:5|max:255|unique:kios,slug',
            'keterangan' => 'required',
            'harga_sewa_per_tahun' => 'required',
            'featured_image' => 'sometimes|image'
            ));

        $kios = new Kios;
        $kios->nomor_kios = $request->nomor_kios;
        $kios->blok_kios = $request->blok_kios;
        $kios->slug = $request->slug;
        $kios->keterangan = Purifier::clean($request->keterangan);
        $kios->harga_sewa_per_tahun = $request->harga_sewa_per_tahun;
        if ($request->hasFile('featured_image'))
        {
            $image = $request->file('featured_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('gambar_kios/' . $filename);
            Image::make($image)->save($location);
            $kios->image = $filename;
        }

        $kios->save();

        return redirect()->route('kios.show', $kios->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kios = Kios::find($id);
        return view('kios.show')->withKios($kios);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kios = Kios::find($id);
        return view('kios.edit')->withKios($kios);
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
        $kios = Kios::find($id);
        $this->validate($request, array(
                'nomor_kios' => 'required|max:255',
                'blok_kios' => 'required|max:255',
                'slug' => "required|alpha_dash|min:5|max:255|unique:kios,slug,$id",
                'keterangan' => 'required',
                'harga_sewa_per_tahun' => 'required'
            ));

        $kios = Kios::find($id);
        $kios->nomor_kios = $request->input('nomor_kios');
        $kios->blok_kios = $request->input('blok_kios');
        $kios->slug = $request->input('slug');
        $kios->keterangan = Purifier::clean($request->input('keterangan'));
        $kios->harga_sewa_per_tahun = $request->input('harga_sewa_per_tahun');

        if ($request->hasFile('featured_image')) {
            $image = $request->file('featured_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('gambar_kios/' . $filename);
            Image::make($image)->resize(800, 400)->save($location);
            $oldFilename = $kios->image;
            $kios->image = $filename;
            Storage::delete($oldFilename);
        }

        $kios->save();

        return redirect()->route('kios.show', $kios->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kios = Kios::find($id);
        Storage::delete($kios->image);
        $kios->delete();
        return redirect()->route('kios.index');
    }
}
