<?php

namespace App\Http\Controllers\Ajax\Auth;

use Bsb\Foundation\Http\Controller;
use Illuminate\Http\Request;
use App\Models\Auth\Module;
use App\Transformer\SingleCollections\Auth\ModuleSingleCollection;

class ModuleController extends Controller
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function manifest(Request $request)
    {
        return response()->json(
            new ModuleSingleCollection(Module::all()),
            200
        );
    }
}
