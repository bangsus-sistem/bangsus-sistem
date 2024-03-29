<?php

namespace App\Http\Controllers\Ajax\Utils;

use Bsb\Foundation\Http\Controller;
use Illuminate\Http\Request;

class VersionCheckController extends Controller
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        return response()->json([
            'app_version' => config('app.version')
        ]);
    }
}
