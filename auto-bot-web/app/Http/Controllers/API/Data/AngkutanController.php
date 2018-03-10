<?php

namespace App\Http\Controllers\API\Data;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Data\Angkutan;

class AngkutanController extends Controller
{
  public function __construct(Request $request, Angkutan $angkutan)
  {
      $this->request = $request;
      $this->angkutan = $angkutan;
  }

  public function index()
  {
      return Angkutan::all();
  }

  public function store(Request $request)
  {
      $data = Angkutan::create($request->all());

      return response()->json(['status' => 'success', 'input', 'data' => $data]);
  }

  public function show($id)
  {
      $data = $this->angkutan
                ->where('id', $id)->paginate(10);
      return response()->json( ['status' => 'success', 'data' => $data] );
  }

  public function update(Request $request, $id)
  {
      $data = $this->angkutan::findOrFail($id);
      $data->update($request->all());

      return response()->json(['status' => 'success', 'update','data' => $data]);
  }

  public function destroy($id)
  {
      $data = $this->angkutan::findOrFail($id);
      $data->delete();
      return '';
  }
}
