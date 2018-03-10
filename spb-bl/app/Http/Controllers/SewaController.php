<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sewa;
use App\Pemilik;
use App\Penyewa;
use App\PemilikTenant;
use Auth;

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

      $user = Auth::user();
      $penyewa = Penyewa::where('user_id',$user->id)->get();

      return view('sewa.form' , compact('active','action','method','penyewa'));
  }

  public function save($request, $id = null)
  {
      if($id){
          $sewa = Sewa::find($id);
      }else{
          $sewa = new Sewa;
      }

      $this->validate($request, [
          'no_telp' => 'required',
          'alamat' => 'required',
          'jk' => 'required',
          'tmpt_lahir' => 'required',
          'tgl_lahir' => 'required',
          'no_identitas' => 'required',
      ]);
      $user = Auth::user();
      $pemilik = Pemilik::where('user_id',$user->id)->get();

      $sewa->kode = str_random(5);
      $sewa->awal = request('awal');
      $sewa->akhir = request('akhir');
      $sewa->lama = request('lama');
      $sewa->pemilik_id = $pemilik->id;

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
