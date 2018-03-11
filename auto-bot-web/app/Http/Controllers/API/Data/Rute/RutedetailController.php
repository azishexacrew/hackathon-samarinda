<?php

namespace App\Http\Controllers\API\Data\Rute;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Data\Rute\Rutedetail;
use App\Models\Data\Rute\Rute;

class RutedetailController extends Controller
{
  public function __construct(Request $request, Rutedetail $rutedetail)
  {
      $this->request = $request;
      $this->rutedetail = $rutedetail;
  }

  public function index()
  {
      $rutedetail = Rutedetail::with('rute')->first();

      //return $rutedetail;
      return Rutedetail::all();
  }

  public function store(Request $request)
  {
      $data = Rutedetail::create($request->all());
      $rutedetail = Rutedetail::with('rute')->first();

      return response()->json(['status' => 'success', 'input', 'data' => $data, $rutedetail]);
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
      $rutedetail = Rutedetail::with('rute')->first();

      return response()->json(['status' => 'success', 'update','data' => $data, $rutedetail]);
  }

  public function destroy($id)
  {
      $data = $this->rutedetail::findOrFail($id);
      $data->delete();
      return '';
  }

    public function updateStatus($id){

        $status = '';

        $rute = Rutedetail::find($id);

        if ($rute){
            $rute->rutes_id = $rute->rutes_id;
            $rute->tps_id = $rute->tps_id;

            if ($rute->status == 'pending'){
                $status = 'proses';
            }elseif ($rute->status == 'proses'){
                $status = 'selesai';
            } else{
                $status = 'selesai';
            }

            $rute->status = $status;

            $rute->save();

            return response()->json(['status' => 'success', 'data' => $rute]);
        }


    }
}
