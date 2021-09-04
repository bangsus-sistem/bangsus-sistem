<?php

namespace App\Http\Controllers\Ajax\Utils;

use Bsb\Foundation\Http\Controller;
use Illuminate\Http\Request;

class AuthorizationController extends Controller
{
    /**
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $role = $request->user()->role;
        $features = $role->features()->with('module', 'action')->get();
        $widgets = $role->widgets;
        $reports = $role->reports;

        return response()->json([
            'features' => $features,
            'widgets' => $widgets,
            'reports' => $reports,
        ]);
    }
}
