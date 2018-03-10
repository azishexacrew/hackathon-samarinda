<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sewa;
use App\Pemilik;
use App\Penyewa;
use App\PemilikTenant;
use Auth;
use Carbon\Carbon;

class SewaController extends Controller
{
  public function index()
  {
      $active = 'pemilik';
      $user = Auth::user();
      $sewa = Sewa::with('pemilik','tenant','penyewa')->where('pemilik_id',$user->id)->orderBy('id','desc');
      $term = request('term');
      if($term){
          $term = '%' . $term . '%';
          $sewa->where('kode','LIKE',$term);
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

      $tenant = PemilikTenant::where('user_id',$user->id)->get();

      return view('sewa.form' , compact('active','action','method','penyewa','tenant'));
  }

  public function save($request, $id = null)
  {
      if($id){
          $sewa = Sewa::find($id);
      }else{
          $sewa = new Sewa;
      }

      $this->validate($request, [
          'awal' => 'required',
          'lama' => 'required',
          'akhir' => 'required',
          'penyewa_id' => 'required',
          'tenant_id' => 'required',
      ]);
      $user = Auth::user();

      $sewa->kode = str_random(5);
      $sewa->awal = Carbon::createFromFormat('d/m/Y', request('awal'))->format('Y-m-d');
      $sewa->akhir = Carbon::createFromFormat('d/m/Y', request('akhir'))->format('Y-m-d');
      $sewa->lama = request('lama');
      $sewa->pemilik_id = $user->id;
      $sewa->penyewa_id = request('penyewa_id');
      $sewa->tenant_id = request('tenant_id');

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
