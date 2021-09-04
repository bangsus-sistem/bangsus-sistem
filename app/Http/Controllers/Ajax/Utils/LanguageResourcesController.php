<?php

namespace App\Http\Controllers\Ajax\Utils;

use Bsb\Foundation\Http\Controller;
use Illuminate\Http\Request;

class LanguageResourcesController extends Controller
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        return response()->json(trans('spa'));
    }
}
