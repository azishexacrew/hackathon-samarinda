<?php

namespace App\Http\Controllers\API\Data;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Profil;
use App\Models\User;

class ProfilController extends Controller
{
  public function __construct(Request $request, Profil $profil,User $user)
  {
    $this->request = $request;
    $this->profil = $profil;
    $this->user = $user;
  }

  public function index()
  {
    $profil = Profil::with('user')->get();

    return response()->json(['status' => 'done' , 'data' => $profil ]);
  }

  public function store(Request $request)
  {
      $data = Profil::create($request->all());
      $profil = Profil::with('user')->first();

      return response()->json(['status' => 'success', 'input', 'data' => $data, $profil]);
  }

  public function show($id)
  {
      $data = $this->profil
                ->where('id', $id)->paginate(10);
      return response()->json( ['status' => 'success', 'data' => $data] );
  }

  public function update(Request $request, $id)
  {
      $data = $this->profil::findOrFail($id);
      $data->update($request->all());
      $profil = Profil::with('user')->first();

      return response()->json(['status' => 'success', 'update','data' => $data, $profil]);
  }

  public function destroy($id)
  {
      $data = $this->profil::findOrFail($id);
      $data->delete();
      return '';
  }
}
