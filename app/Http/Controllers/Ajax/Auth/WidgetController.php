<?php

namespace App\Http\Controllers\Ajax\Auth;

use Bsb\Foundation\Http\Controller;
use Illuminate\Http\Request;
use App\Models\Auth\Widget;
use App\Transformer\SingleCollections\Auth\WidgetSingleCollection;

class WidgetController extends Controller
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function manifest(Request $request)
    {
        return response()->json(
            new WidgetSingleCollection(Widget::all()),
            200
        );
    }
}
