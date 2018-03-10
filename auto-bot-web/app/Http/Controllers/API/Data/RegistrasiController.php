<?php

namespace App\Http\Controllers\API\Data;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class RegistrasiController extends Controller
{
    public function __construct(Request $request, User $user)
    {
      $this->request = $request;
      $this->user = $user;
    }

    public function index()
    {
      return User::all();
    }

    public function store(Request $request)
    {
      $request->validate([
        'name' => 'required',
        'email' => 'required',
        'password' => 'required',
        'rule' => 'required',
      ]);

      $user = [
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'rule' => $request->rule,
        'fcm_token' => $request->fcm_password,
      ];

      $save = User::create($user);
      return response()->json(['status' => 'success', 'input', 'data' => $save]);
    }

    public function show($id)
    {
        $data = $this->user
                  ->where('id', $id)->paginate(10);
        return response()->json( ['status' => 'success', 'data' => $data] );
    }

    public function update(Request $request, $id)
    {
        $data = $this->user::findOrFail($id);
        $request->validate([
          'name' => 'required',
          'email' => 'required',
          'password' => 'required',
          'rule' => 'required',
        ]);

        $user = [
          'name' => $request->name,
          'email' => $request->email,
          'password' => bcrypt($request->password),
          'rule' => $request->rule,
          'fcm_token' => $request->fcm_password,
        ];

        $update = user::find($id)->update($user);

        return response()->json(['status' => 'success', 'update','data' => $data]);
    }

    public function destroy($id)
    {
        $data = $this->user::findOrFail($id);
        $data->delete();
        return '';
    }
}
