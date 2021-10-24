<?php

namespace App\Http\Controllers\Ajax\Master;

use Bsb\Foundation\Http\Controller;
use App\Models\Master\OperationalPhotoPenaltyType;
use Illuminate\Http\Request;
use App\Http\Requests\Ajax\Master\OperationalPhotoPenaltyType\{
    IndexRequest,
    ShowRequest,
    StoreRequest,
    AmendRequest,
    ReviseActivationRequest,
    DestroyRequest,
};
use App\Tasks\Master\OperationalPhotoPenaltyType\{
    StoreTask,
    AmendTask,
    ReviseActivationTask,
};
use App\Transformer\SingleCollections\Master\OperationalPhotoPenaltyTypeSingleCollection;
use App\Transformer\PaginatedCollections\Master\OperationalPhotoPenaltyTypePaginatedCollection;
use App\Transformer\RelatedResources\Master\OperationalPhotoPenaltyTypeRelatedResource;

class OperationalPhotoPenaltyTypeController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function manifest()
    {
        return response()->json(new OperationalPhotoPenaltyTypeSingleCollection(OperationalPhotoPenaltyType::all()), 200);
    }

    /**
     * @param  \App\Http\Requests\Ajax\Master\OperationalPhotoPenaltyType\IndexRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(IndexRequest $request)
    {
        return response()->json(
            new OperationalPhotoPenaltyTypePaginatedCollection(
                OperationalPhotoPenaltyType::where(
                    $this->buildWhere($request)
                        ->with($request)
                        ->index('code')->mode('string')
                        ->index('name')->mode('string')
                        ->index('active')->mode('boolean')
                        ->index('operational_photo_type_id')->mode('id')
                        ->done()
                )
                    ->orderBy($request->input('sort'), $request->input('order'))
                    ->paginate($request->input('count'))
            ),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Ajax\Master\OperationalPhotoPenaltyType\ShowRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(ShowRequest $request, $id)
    {
        return response()->json(
            new OperationalPhotoPenaltyTypeRelatedResource(OperationalPhotoPenaltyType::findOrFail($id)),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Ajax\Master\OperationalPhotoPenaltyType\StoreRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreRequest $request)
    {
        return response()->json(
            new OperationalPhotoPenaltyTypeRelatedResource(
                $this->transmit(new StoreTask, $request)
            ),
            201
        );
    }

    /**
     * @param  \App\Http\Requests\Ajax\Master\OperationalPhotoPenaltyType\AmendRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function amend(AmendRequest $request)
    {
        return response()->json(
            new OperationalPhotoPenaltyTypeRelatedResource(
                $this->transmit(new AmendTask, $request)
            ),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Ajax\Master\OperationalPhotoPenaltyType\ReviseActivationRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function reviseActivate(ReviseActivationRequest $request)
    {
        return response()->json(
            new OperationalPhotoPenaltyTypeRelatedResource(
                $this->transmit(new ReviseActivationTask, $request, true)
            ),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Ajax\Master\OperationalPhotoPenaltyType\ReviseActivationRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function reviseDeactivate(ReviseActivationRequest $request)
    {
        return response()->json(
            new OperationalPhotoPenaltyTypeRelatedResource(
                $this->transmit(new ReviseActivationTask, $request, false)
            ),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Ajax\Master\OperationalPhotoPenaltyType\DestroyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(DestroyRequest $request)
    {
        $operationalPhotoPenaltyType = OperationalPhotoPenaltyType::findOrFail($request->input('id'));
        $this->transaction(fn () => $operationalPhotoPenaltyType->delete());
        return response()->noContent();
    }
}
