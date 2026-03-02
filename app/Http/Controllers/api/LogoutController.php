<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class LogoutController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $removetoken = JWTauth::invalidate(JWTauth::getToken());

        if(!$removetoken) {
            return response()->json([
                'success' => true,
                'message' => 'User berhasil logout',
            ], 200);
        }
    }
}
