<?php

namespace App\Http\Controllers;

use Auth;
use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public function response($data, $status = 200)
    {
        return response()->json($data, $status);
    }


    // protected function respondWithToken($token)
    // {
    //     return response()->json([
    //         'token' => $token,
    //         'token_type' => 'bearer',
    //         'expires_in' => Auth::factory()->getTTL() * 60
    //     ], 200);
    // }
}