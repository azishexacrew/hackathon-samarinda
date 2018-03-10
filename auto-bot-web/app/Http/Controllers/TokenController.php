<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use JWTAuth;
use App\Models\User;
class TokenController extends Controller
{
  public function auth(Request $request) {
        $credentials = $request->only('email', 'password');

        $validator = Validator::make($credentials, [
                    'email' => 'required|email',
                    'password' => 'required'
        ]);

        if ($validator->fails()) {
            return response()
                            ->json([
                                'code' => 1,
                                'message' => 'Validation failed.',
                                'errors' => $validator->errors()
                                    ], 422);
        }

        $token = JWTAuth::attempt($credentials);

        $user = User::where( 'email', request()->email )->with('profil')->first();

        if ($token) {
            return response()->json(['token' => $token, 'data' => $user]);
        } else {
            return response()->json(['code' => 2, 'message' => 'Invalid credentials.'], 401);
        }
  }
}
