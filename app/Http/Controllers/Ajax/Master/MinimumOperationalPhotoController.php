<?php

namespace App\Http\Controllers\Ajax\Master;

use Bsb\Foundation\Http\Controller;
use App\Models\Master\MinimumOperationalPhoto;
use Illuminate\Http\Request;
use App\Http\Requests\Ajax\Master\MinimumOperationalPhoto\{
    ShowRequest,
    AmendRequest,
};
use App\Tasks\Master\MinimumOperationalPhoto\AmendTask;
use App\Transformer\SingleCollections\Master\MinimumOperationalPhotoSingleCollection;
use App\Transformer\RelatedResources\Master\OperationalPhotoTypeRelatedResource;

class MinimumOperationalPhotoController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function manifest()
    {
        return response()->json(new MinimumOperationalPhotoSingleCollection(MinimumOperationalPhoto::all()), 200);
    }

    /**
     * @param  \App\Http\Requests\Ajax\Master\MinimumOperationalPhoto\ShowRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(ShowRequest $request, $id)
    {
        return response()->json(
            new MinimumOperationalPhotoRelatedResource(MinimumOperationalPhoto::findOrFail($id)),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Ajax\Master\MinimumOperationalPhoto\AmendRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function amend(AmendRequest $request)
    {
        return response()->json(
            new OperationalPhotoTypeRelatedResource(
                $this->transmit(new AmendTask, $request)
            ),
            200
        );
    }
}
