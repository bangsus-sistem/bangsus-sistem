<?php

namespace App\Http\Controllers\Ajax\Master;

use Bsb\Foundation\Http\Controller;
use App\Models\Master\GeneralCleaningActivity;
use Illuminate\Http\Request;
use App\Http\Requests\Ajax\Master\GeneralCleaningActivity\{
    IndexRequest,
    ShowRequest,
    StoreRequest,
    AmendRequest,
    ReviseActivationRequest,
    DestroyRequest,
};
use App\Tasks\Master\GeneralCleaningActivity\{
    StoreTask,
    AmendTask,
    ReviseActivationTask,
};
use App\Transformer\SingleCollections\Master\GeneralCleaningActivitySingleCollection;
use App\Transformer\PaginatedCollections\Master\GeneralCleaningActivityPaginatedCollection;
use App\Transformer\RelatedResources\Master\GeneralCleaningActivityRelatedResource;

class GeneralCleaningActivityController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function manifest()
    {
        return response()->json(new GeneralCleaningActivitySingleCollection(GeneralCleaningActivity::all()), 200);
    }

    /**
     * @param  \App\Http\Requests\Ajax\Master\GeneralCleaningActivity\IndexRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(IndexRequest $request)
    {
        return response()->json(
            new GeneralCleaningActivityPaginatedCollection(
                GeneralCleaningActivity::where(
                    $this->buildWhere($request)
                        ->with($request)
                        ->index('code')->mode('string')
                        ->index('name')->mode('string')
                        ->index('active')->mode('boolean')
                        ->done()
                )
                    ->orderBy($request->input('sort'), $request->input('order'))
                    ->paginate($request->input('count'))
            ),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Ajax\Master\GeneralCleaningActivity\ShowRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(ShowRequest $request, $id)
    {
        return response()->json(
            new GeneralCleaningActivityRelatedResource(GeneralCleaningActivity::findOrFail($id)),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Ajax\Master\GeneralCleaningActivity\StoreRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreRequest $request)
    {
        return response()->json(
            new GeneralCleaningActivityRelatedResource(
                $this->transmit(new StoreTask, $request)
            ),
            201
        );
    }

    /**
     * @param  \App\Http\Requests\Ajax\Master\GeneralCleaningActivity\AmendRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function amend(AmendRequest $request)
    {
        return response()->json(
            new GeneralCleaningActivityRelatedResource(
                $this->transmit(new AmendTask, $request)
            ),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Ajax\Master\GeneralCleaningActivity\ReviseActivationRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function reviseActivate(ReviseActivationRequest $request)
    {
        return response()->json(
            new GeneralCleaningActivityRelatedResource(
                $this->transmit(new ReviseActivationTask, $request, true)
            ),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Ajax\Master\GeneralCleaningActivity\ReviseActivationRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function reviseDeactivate(ReviseActivationRequest $request)
    {
        return response()->json(
            new GeneralCleaningActivityRelatedResource(
                $this->transmit(new ReviseActivationTask, $request, false)
            ),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Ajax\Master\GeneralCleaningActivity\DestroyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(DestroyRequest $request)
    {
        $generalCleaningActivity = GeneralCleaningActivity::findOrFail($request->input('id'));
        $this->transaction(fn () => $generalCleaningActivity->delete());
        return response()->noContent();
    }
}
