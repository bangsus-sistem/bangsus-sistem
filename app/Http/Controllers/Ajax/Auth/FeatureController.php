<?php

namespace App\Http\Controllers\Ajax\Auth;

use Bsb\Foundation\Http\Controller;
use Illuminate\Http\Request;
use App\Models\Auth\Feature;
use App\Transformer\SingleCollections\Auth\FeatureSingleCollection;

class FeatureController extends Controller
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function manifest(Request $request)
    {
        return response()->json(
            new FeatureSingleCollection(Feature::all()),
            200
        );
    }
}
