<?php

namespace App\Http\Controllers\Ajax\Auth;

use Bsb\Foundation\Http\Controller;
use Illuminate\Http\Request;
use App\Models\Auth\Package;
use App\Transformer\SingleCollections\Auth\PackageSingleCollection;

class PackageController extends Controller
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function manifest(Request $request)
    {
        return response()->json(
            new PackageSingleCollection(Package::all()),
            200
        );
    }
}
