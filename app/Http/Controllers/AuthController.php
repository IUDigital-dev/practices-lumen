<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $this->validate($request, [
            'nombre_usuario' => 'required|string',
            'password' => 'required|string',
        ]);

        if (! $token = Auth::attempt($request->only(['nombre_usuario', 'password']))) {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }

        return $this->respondWithToken($token);

    }
}
