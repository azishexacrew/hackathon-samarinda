<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ruko;
use Session;
use Storage;
use Image;
use Purifier;

class RukoController extends Controller
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
        $rukos = Ruko::orderBy('id', 'desc')->paginate(5);
        return view('ruko.index')->withRukos($rukos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ruko.create');
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
            'nomor_ruko' => 'required|max:255',
            'blok_ruko' => 'required|max:255',
            'slug' => 'required|alpha_dash|min:5|max:255|unique:rukos,slug',
            'keterangan' => 'required',
            'harga_sewa_per_tahun' => 'required',
            'featured_image' => 'sometimes|image'
            ));

        $ruko = new Ruko;
        $ruko->nomor_ruko = $request->nomor_ruko;
        $ruko->blok_ruko = $request->blok_ruko;
        $ruko->slug = $request->slug;
        $ruko->keterangan = Purifier::clean($request->keterangan);
        $ruko->harga_sewa_per_tahun = $request->harga_sewa_per_tahun;
        if ($request->hasFile('featured_image'))
        {
            $image = $request->file('featured_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('gambar_ruko/' . $filename);
            Image::make($image)->save($location);
            $ruko->image = $filename;
        }

        $ruko->save();

        return redirect()->route('ruko.show', $ruko->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ruko = Ruko::find($id);
        return view('ruko.show')->withRuko($ruko);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ruko = Ruko::find($id);
        return view('ruko.edit')->withRuko($ruko);
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
        $ruko = Ruko::find($id);
        $this->validate($request, array(
                'nomor_ruko' => 'required|max:255',
                'blok_ruko' => 'required|max:255',
                'slug' => "required|alpha_dash|min:5|max:255|unique:rukos,slug,$id",
                'keterangan' => 'required',
                'harga_sewa_per_tahun' => 'required'
            ));

        $ruko = Ruko::find($id);
        $ruko->nomor_ruko = $request->input('nomor_ruko');
        $ruko->blok_ruko = $request->input('blok_ruko');
        $ruko->slug = $request->input('slug');
        $ruko->keterangan = Purifier::clean($request->input('keterangan'));
        $ruko->harga_sewa_per_tahun = $request->input('harga_sewa_per_tahun');

        if ($request->hasFile('featured_image')) {
            $image = $request->file('featured_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('gambar_ruko/' . $filename);
            Image::make($image)->resize(800, 400)->save($location);
            $oldFilename = $ruko->image;
            $ruko->image = $filename;
            Storage::delete($oldFilename);
        }

        $ruko->save();

        return redirect()->route('ruko.show', $ruko->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ruko = Ruko::find($id);
        Storage::delete($ruko->image);
        $ruko->delete();
        return redirect()->route('ruko.index');
    }
}
