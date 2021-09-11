<?php

namespace App\Http\Controllers\Ajax\Auth;

use Bsb\Foundation\Http\Controller;
use Illuminate\Http\Request;
use App\Models\Auth\Action;
use App\Transformer\SingleCollections\Auth\ActionSingleCollection;

class ActionController extends Controller
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function manifest(Request $request)
    {
        return response()->json(
            new ActionSingleCollection(Action::all()),
            200
        );
    }
}
