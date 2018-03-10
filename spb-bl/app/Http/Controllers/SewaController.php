<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sewa;

class SewaController extends Controller
{
  public function index()
  {
      $active = 'pemilik';
      $sewa = Sewa::orderBy('id','desc');
      $term = request('term');
      if($term){
          $term = '%' . $term . '%';
          $sewa->where('nama','LIKE',$term)->orwhere('no_identitas','LIKE',$term);
      }
      $sewa = $sewa->paginate(20);
      return view('sewa.index', compact('sewa'));
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
          $sewa = Sewa::find($id);
          if($sewa){
              session()->flash('_old_input', array_merge($sewa->toArray(), old()));
          }
      }
      $active = 'pemilik';
      $action = route('webpemilik::sewa.' . ($id ? 'update' : 'store'), $id);
      $method = $id ? 'PUT' : 'POST';
      return view('sewa.form' , compact('active','action','method'));
  }

  public function save($request, $id = null)
  {
      if($id){
          $sewa = Sewa::find($id);
      }else{
          $sewa = new Sewa;
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

      $sewa->nama = request('nama');
      $sewa->no_telp = request('no_telp');
      $sewa->alamat = request('alamat');
      $sewa->jk = request('jk');
      $sewa->tmpt_lahir = request('tmpt_lahir');
      $sewa->tgl_lahir = request('tgl_lahir');
      $sewa->no_identitas = request('no_identitas');

      $sewa->save();

      return redirect(route('webpemilik::sewa.index'));

  }

  public function destroy($id)
  {
      $sewa = Sewa::find($id);
      $sewa->delete();
      return redirect(route('webpemilik::sewa.index'));
  }
}
