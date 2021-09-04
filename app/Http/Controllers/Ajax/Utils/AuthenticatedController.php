<?php

namespace App\Http\Controllers\Ajax\Utils;

use Bsb\Foundation\Http\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedController extends Controller
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        return response()->json([
            'logged_in' => Auth::check()
        ]);
    }
}
