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
      $rute = Rute::with('user','rutedetail', 'rutedetail.tps', 'angkutan', 'rutetrack')->get();

      return response()->json(['status' => 'done' , 'data' => $rute ]);
  }

    public function my($id)
    {
        $rute = Rute::with('user','rutedetail', 'rutedetail.tps', 'angkutan', 'rutetrack')->where('users_id', $id)->get();

        return response()->json(['status' => 'done' , 'data' => $rute ]);
    }

  public function store(Request $request)
  {
      $data = Rute::create($request->all());
      $rute = Rute::with('user')->first();

      return response()->json(['status' => 'success', 'input', 'data' => $data, $rute]);
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
      $rute = Rute::with('user')->first();

      return response()->json(['status' => 'success', 'update','data' => $data, $rute]);
  }

  public function destroy($id)
  {
      $data = $this->rute::findOrFail($id);
      $data->delete();
      return '';
  }

  public function updateStatus($id){

      $status = '';

      $rute = Rute::find($id);

      if ($rute){
          $rute->nama = $rute->nama;
          $rute->angkutans_id = $rute->angkutans_id;
          $rute->time = $rute->time;
          $rute->date = $rute->date;
          $rute->users_id = $rute->users_id;

          if ($rute->status == 'pending'){
              $status = 'proses';
          }elseif ($rute->status == 'proses'){
              $status = 'selesai';
          } else{
              $status = 'selesai';
          }

          $rute->status = $status;

          $rute->save();

          return response()->json(['status' => 'success']);
      }


  }
}
