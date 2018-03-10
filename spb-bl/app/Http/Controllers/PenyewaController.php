<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penyewa;

class PenyewaController extends Controller
{
  public function index()
  {
      $active = 'pemilik';
      $penyewa = Penyewa::orderBy('id','desc');
      $term = request('term');
      if($term){
          $term = '%' . $term . '%';
          $penyewa->where('nama','LIKE',$term)->orwhere('no_identitas','LIKE',$term);
      }
      $penyewa = $penyewa->paginate(20);
      return view('penyewa.index', compact('penyewa'));
  }

  public function create()
  {
      return $this->form();
  }

  public function store(Request $request)
  {
      return $this->save($request);
  }

  public function edit($id)
  {
      return $this->form($id);
  }

  public function update(Request $request, $id)
  {
      return $this->save($request, $id);
  }

  public function form($id = null)
  {
      if($id){
          $penyewa = Penyewa::find($id);
          if($penyewa){
              session()->flash('_old_input', array_merge($penyewa->toArray(), old()));
          }
      }
      $active = 'pemilik';
      $action = route('webpemilik::penyewa.' . ($id ? 'update' : 'store'), $id);
      $method = $id ? 'PUT' : 'POST';
      return view('penyewa.form' , compact('active','action','method'));
  }

  public function save($request, $id = null)
  {
      if($id){
          $penyewa = Penyewa::find($id);
      }else{
          $penyewa = new Penyewa;
      }

      $this->validate($request, [
          'nama' => 'required',
          'no_telp' => 'required',
          'alamat' => 'required',
          'jk' => 'required',
          'tmpt_lahir' => 'required',
          'tgl_lahir' => 'required',
          'no_identitas' => 'required',
      ]);

      $penyewa->nama = request('nama');
      $penyewa->no_telp = request('no_telp');
      $penyewa->alamat = request('alamat');
      $penyewa->jk = request('jk');
      $penyewa->tmpt_lahir = request('tmpt_lahir');
      $penyewa->tgl_lahir = request('tgl_lahir');
      $penyewa->no_identitas = request('no_identitas');

      $penyewa->save();

      return redirect(route('webpemilik::penyewa.index'));

  }

  public function show(){
    
  }

  public function destroy($id)
  {
      $penyewa = Penyewa::find($id);
      $penyewa->delete();
      return redirect(route('webpemilik::penyewa.index'));
  }
}
