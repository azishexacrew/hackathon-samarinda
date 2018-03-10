<?php

namespace App\Http\Controllers\API\Data;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Data\Tps;

class TpsController extends Controller
{
    public function __construct(Request $request, Tps $tps)
    {
        $this->request = $request;
        $this->tps = $tps;
    }

    public function index()
    {
        return tps::all();
    }

    public function store(Request $request)
    {
        $data = Tps::create($request->all());

        return response()->json(['status' => 'success', 'input', 'data' => $data]);
    }

    public function show($id)
    {
        $data = $this->tps
                  ->where('id', $id)->paginate(10);
        return response()->json( ['status' => 'success', 'data' => $data] );
    }

    public function update(Request $request, $id)
    {
        $data = $this->tps::findOrFail($id);
        $data->update($request->all());

        return response()->json(['status' => 'success', 'update','data' => $data]);
    }

    public function destroy($id)
    {
        $data = $this->tps::findOrFail($id);
        $data->delete();
        return '';
    }
}
