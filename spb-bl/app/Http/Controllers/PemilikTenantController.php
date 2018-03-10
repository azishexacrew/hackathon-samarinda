<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PemilikTenant;

class PemilikTenantController extends Controller
{
  public function index()
  {
      $active = 'pemilik';
      $tenant = PemilikTenant::orderBy('id','desc');
      $term = request('term');
      if($term){
          $term = '%' . $term . '%';
          $tenant->where('area','LIKE',$term)->orwhere('no_identitas','LIKE',$term);
      }
      $tenant = $tenant->paginate(20);
      return view('tenant.index', compact('tenant'));
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
          $tenant = PemilikTenant::find($id);
          if($tenant){
              session()->flash('_old_input', array_merge($tenant->toArray(), old()));
          }
      }
      $active = 'pemilik';
      $action = route('webpemilik::tenant.' . ($id ? 'update' : 'store'), $id);
      $method = $id ? 'PUT' : 'POST';
      return view('tenant.form' , compact('active','action','method'));
  }

  public function save($request, $id = null)
  {
      if($id){
          $tenant = PemilikTenant::find($id);
      }else{
          $tenant = new PemilikTenant;
      }

      $this->validate($request, [
          'area' => 'required',
          'blok' => 'required',
          'nomor' => 'required',
          'luas' => 'required',
          'harga' => 'required',
      ]);

      $tenant->area = request('area');
      $tenant->blok = request('blok');
      $tenant->nomor = request('nomor');
      $tenant->luas = request('luas');
      $tenant->harga = request('harga');
      $tenant->pemilik_id = '0';
      $tenant->harga = request('harga');

      $tenant->save();

      return redirect(route('webpemilik::tenant.index'));

  }

  public function show(){

  }

  public function destroy($id)
  {
      $tenant = PemilikTenant::find($id);
      $tenant->delete();
      return redirect(route('webpemilik::tenant.index'));
  }
}
