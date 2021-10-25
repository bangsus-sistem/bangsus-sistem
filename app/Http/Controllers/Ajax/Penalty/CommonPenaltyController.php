<?php

namespace App\Http\Controllers\Ajax\Penalty;

use Bsb\Foundation\Http\Controller;
use App\Models\Penalty\CommonPenalty;
use Illuminate\Http\Request;
use App\Http\Requests\Ajax\Penalty\CommonPenalty\{
    IndexRequest,
    ShowRequest,
    StoreRequest,
    AmendRequest,
    ReviseActivationRequest,
    DestroyRequest,
};
use App\Tasks\Penalty\CommonPenalty\{
    StoreTask,
    AmendTask,
    ReviseActivationTask,
};
use App\Transformer\SingleCollections\Penalty\CommonPenaltySingleCollection;
use App\Transformer\PaginatedCollections\Penalty\CommonPenaltyPaginatedCollection;
use App\Transformer\RelatedResources\Penalty\CommonPenaltyRelatedResource;

class CommonPenaltyController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function manifest()
    {
        return response()->json(new CommonPenaltySingleCollection(CommonPenalty::all()), 200);
    }

    /**
     * @param  \App\Http\Requests\Ajax\Penalty\CommonPenalty\IndexRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(IndexRequest $request)
    {
        return response()->json(
            new CommonPenaltyPaginatedCollection(
                CommonPenalty::where(
                    $this->buildWhere($request)
                        ->with($request)
                        ->index('code')->mode('string')
                        // ->index('transaction_date')->column(['transaction_datetime'])->mode('date')
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
     * @param  \App\Http\Requests\Ajax\Penalty\CommonPenalty\ShowRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(ShowRequest $request, $id)
    {
        return response()->json(
            new CommonPenaltyRelatedResource(CommonPenalty::findOrFail($id)),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Ajax\Penalty\CommonPenalty\StoreRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreRequest $request)
    {
        return response()->json(
            new CommonPenaltyRelatedResource(
                $this->transmit(new StoreTask, $request)
            ),
            201
        );
    }

    /**
     * @param  \App\Http\Requests\Ajax\Penalty\CommonPenalty\AmendRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function amend(AmendRequest $request)
    {
        return response()->json(
            new CommonPenaltyRelatedResource(
                $this->transmit(new AmendTask, $request)
            ),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Ajax\Penalty\CommonPenalty\ReviseActivationRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function reviseActivate(ReviseActivationRequest $request)
    {
        return response()->json(
            new CommonPenaltyRelatedResource(
                $this->transmit(new ReviseActivationTask, $request, true)
            ),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Ajax\Penalty\CommonPenalty\ReviseActivationRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function reviseDeactivate(ReviseActivationRequest $request)
    {
        return response()->json(
            new CommonPenaltyRelatedResource(
                $this->transmit(new ReviseActivationTask, $request, false)
            ),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Ajax\Penalty\CommonPenalty\DestroyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(DestroyRequest $request)
    {
        $unit = CommonPenalty::findOrFail($request->input('id'));
        $this->transaction(fn () => $unit->delete());
        return response()->noContent();
    }
}
