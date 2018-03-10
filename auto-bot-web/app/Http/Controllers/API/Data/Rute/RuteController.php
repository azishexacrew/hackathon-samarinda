<?php

namespace App\Http\Controllers\API\Data\Rute;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Data\Rute\Rute;

class RuteController extends Controller
{
  public function __construct(Request $request, Rute $rute)
  {
      $this->request = $request;
      $this->rute = $rute;
  }

  public function index()
  {
      return rute::all();
  }

  public function store(Request $request)
  {
      $data = Rute::create($request->all());

      return response()->json(['status' => 'success', 'input', 'data' => $data]);
  }

  public function show($id)
  {
      $data = $this->rute
                ->where('id', $id)->paginate(10);
      return response()->json( ['status' => 'success', 'data' => $data] );
  }

  public function update(Request $request, $id)
  {
      $data = $this->rute::findOrFail($id);
      $data->update($request->all());

      return response()->json(['status' => 'success', 'update','data' => $data]);
  }

  public function destroy($id)
  {
      $data = $this->rute::findOrFail($id);
      $data->delete();
      return '';
  }
}
