<?php

namespace App\Http\Controllers\Ajax\Master;

use Bsb\Foundation\Http\Controller;
use App\Models\Master\DisciplinaryValue;
use Illuminate\Http\Request;
use App\Http\Requests\Ajax\Master\DisciplinaryValue\{
    StoreRequest,
    AmendRequest,
    DestroyRequest,
};
use App\Tasks\Master\DisciplinaryValue\{
    StoreTask,
    AmendTask,
};
use App\Transformer\SingleCollections\Master\DisciplinaryValueSingleCollection;
use App\Transformer\PaginatedCollections\Master\DisciplinaryValuePaginatedCollection;
use App\Transformer\RelatedResources\Master\DisciplinaryValueRelatedResource;

class DisciplinaryValueController extends Controller
{
    /**
     * @param  \App\Http\Requests\Ajax\Master\DisciplinaryValue\StoreRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreRequest $request)
    {
        return response()->json(
            new DisciplinaryValueRelatedResource(
                $this->transmit(new StoreTask, $request)
            ),
            201
        );
    }

    /**
     * @param  \App\Http\Requests\Ajax\Master\DisciplinaryValue\AmendRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function amend(AmendRequest $request)
    {
        return response()->json(
            new DisciplinaryValueRelatedResource(
                $this->transmit(new AmendTask, $request)
            ),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Ajax\Master\DisciplinaryValue\DestroyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(DestroyRequest $request)
    {
        $disciplinaryValue = DisciplinaryValue::findOrFail($request->input('id'));
        $this->transaction(fn () => $disciplinaryValue->delete());
        return response()->noContent();
    }
}
