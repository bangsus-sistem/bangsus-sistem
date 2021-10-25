<?php

namespace App\Http\Controllers\Ajax\Penalty;

use Bsb\Foundation\Http\Controller;
use App\Models\Penalty\MaterialPenalty;
use Illuminate\Http\Request;
use App\Http\Requests\Ajax\Penalty\MaterialPenalty\{
    IndexRequest,
    ShowRequest,
    StoreRequest,
    AmendRequest,
    ReviseActivationRequest,
    DestroyRequest,
};
use App\Tasks\Penalty\MaterialPenalty\{
    StoreTask,
    AmendTask,
    ReviseActivationTask,
};
use App\Transformer\SingleCollections\Penalty\MaterialPenaltySingleCollection;
use App\Transformer\PaginatedCollections\Penalty\MaterialPenaltyPaginatedCollection;
use App\Transformer\RelatedResources\Penalty\MaterialPenaltyRelatedResource;

class MaterialPenaltyController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function manifest()
    {
        return response()->json(new MaterialPenaltySingleCollection(MaterialPenalty::all()), 200);
    }

    /**
     * @param  \App\Http\Requests\Ajax\Penalty\MaterialPenalty\IndexRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(IndexRequest $request)
    {
        return response()->json(
            new MaterialPenaltyPaginatedCollection(
                MaterialPenalty::where(
                    $this->buildWhere($request)
                        ->with($request)
                        ->index('code')->mode('string')
                        // ->index('transaction_date')->column(['transaction_datetime'])->mode('date')
                        ->index('month')->mode('month')
                        ->index('branch_id')->mode('id')
                        ->done()
                )
                    ->orderBy($request->input('sort'), $request->input('order'))
                    ->paginate($request->input('count'))
            ),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Ajax\Penalty\MaterialPenalty\ShowRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(ShowRequest $request, $id)
    {
        return response()->json(
            new MaterialPenaltyRelatedResource(MaterialPenalty::findOrFail($id)),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Ajax\Penalty\MaterialPenalty\StoreRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreRequest $request)
    {
        return response()->json(
            new MaterialPenaltyRelatedResource(
                $this->transmit(new StoreTask, $request)
            ),
            201
        );
    }

    /**
     * @param  \App\Http\Requests\Ajax\Penalty\MaterialPenalty\AmendRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function amend(AmendRequest $request)
    {
        return response()->json(
            new MaterialPenaltyRelatedResource(
                $this->transmit(new AmendTask, $request)
            ),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Ajax\Penalty\MaterialPenalty\ReviseActivationRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function reviseActivate(ReviseActivationRequest $request)
    {
        return response()->json(
            new MaterialPenaltyRelatedResource(
                $this->transmit(new ReviseActivationTask, $request, true)
            ),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Ajax\Penalty\MaterialPenalty\ReviseActivationRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function reviseDeactivate(ReviseActivationRequest $request)
    {
        return response()->json(
            new MaterialPenaltyRelatedResource(
                $this->transmit(new ReviseActivationTask, $request, false)
            ),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Ajax\Penalty\MaterialPenalty\DestroyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(DestroyRequest $request)
    {
        $unit = MaterialPenalty::findOrFail($request->input('id'));
        $this->transaction(fn () => $unit->delete());
        return response()->noContent();
    }
}
