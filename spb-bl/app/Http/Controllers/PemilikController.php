<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Pemilik;

class PemilikController extends Controller
{
  public function index()
  {
      $active = 'pemilik';
      $pemilik = Pemilik::orderBy('id','desc');
      $term = request('term');
      if($term){
          $term = '%' . $term . '%';
          $pemilik->where('nama','LIKE',$term)->orwhere('no_telp','LIKE',$term);
      }
      $pemilik = $pemilik->paginate(20);
      return view('pemilik.index', compact('pemilik'));
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
          $pemilik = Pemilik::find($id);
          if($pemilik){
              session()->flash('_old_input', array_merge($pemilik->toArray(), old()));
          }
      }
      $active = 'pemilik';
      $action = route('web::data-pemilik.' . ($id ? 'update' : 'store'), $id);
      $method = $id ? 'PUT' : 'POST';
      return view('pemilik.form' , compact('active','action','method'));
  }

  public function save($request, $id = null)
  {
      if($id){
          $pemilik = Pemilik::find($id);
      }else{
          $user = new User;
      }

      $this->validate($request, [
          'nama' => 'required',
          'no_telp' => 'required',
          'alamat' => 'required',
          'jk' => 'required',
          'tmpt_lahir' => 'required',
          'tgl_lahir' => 'required',
          'no_identitas' => 'required',
          'name' => 'required|string|max:255',
          'email' => 'required|string|email|max:255|unique:users',
          'password' => 'required|string|min:6|confirmed',
      ]);


      $user->name =  request('name');
      $user->email = request('email');
      $user->level = 'Pemilik';
      $user->password = Hash::make(request('password'));

      $user->save();

      $pemilik = new Pemilik;

      $pemilik->nama = request('nama');
      $pemilik->kode = str_random(5);
      $pemilik->no_telp = request('no_telp');
      $pemilik->alamat = request('alamat');
      $pemilik->jk = request('jk');
      $pemilik->tmpt_lahir = request('tmpt_lahir');
      $pemilik->tgl_lahir = request('tgl_lahir');
      $pemilik->no_identitas = request('no_identitas');
      $pemilik->user_id = $user->id;

      $pemilik->save();

      return redirect(route('web::data-pemilik.index'));

  }

  public function destroy($id)
  {
      $pemilik = Pemilik::find($id);
      $pemilik->delete();
      return redirect(route('web::data-pemilik.index'));
  }
}
