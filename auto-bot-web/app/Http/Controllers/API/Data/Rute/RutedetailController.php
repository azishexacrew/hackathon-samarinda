<?php

namespace App\Http\Controllers\API\Data\Rute;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Data\Rute\Rutedetail;

class RutedetailController extends Controller
{
  public function __construct(Request $request, Rutedetail $rutedetail)
  {
      $this->request = $request;
      $this->rutedetail = $rutedetail;
  }

  public function index()
  {
      return Rutedetail::all();
  }

  public function store(Request $request)
  {
      $data = Rutedetail::create($request->all());

      return response()->json(['status' => 'success', 'input', 'data' => $data]);
  }

  public function show($id)
  {
      $data = $this->rutedetail
                ->where('id', $id)->paginate(10);
      return response()->json( ['status' => 'success', 'data' => $data] );
  }

  public function update(Request $request, $id)
  {
      $data = $this->rutedetail::findOrFail($id);
      $data->update($request->all());

      return response()->json(['status' => 'success', 'update','data' => $data]);
  }

  public function destroy($id)
  {
      $data = $this->rutedetail::findOrFail($id);
      $data->delete();
      return '';
  }
}
