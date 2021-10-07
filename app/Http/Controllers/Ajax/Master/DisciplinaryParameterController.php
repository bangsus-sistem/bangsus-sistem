<?php

namespace App\Http\Controllers\Ajax\Master;

use Bsb\Foundation\Http\Controller;
use App\Models\Master\DisciplinaryParameter;
use Illuminate\Http\Request;
use App\Http\Requests\Ajax\Master\DisciplinaryParameter\{
    IndexRequest,
    ShowRequest,
    StoreRequest,
    AmendRequest,
    ReviseActivationRequest,
    DestroyRequest,
};
use App\Tasks\Master\DisciplinaryParameter\{
    StoreTask,
    AmendTask,
    ReviseActivationTask,
};
use App\Transformer\SingleCollections\Master\DisciplinaryParameterSingleCollection;
use App\Transformer\PaginatedCollections\Master\DisciplinaryParameterPaginatedCollection;
use App\Transformer\RelatedResources\Master\DisciplinaryParameterRelatedResource;

class DisciplinaryParameterController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function manifest()
    {
        return response()->json(new DisciplinaryParameterSingleCollection(DisciplinaryParameter::all()), 200);
    }

    /**
     * @param  \App\Http\Requests\Ajax\Master\DisciplinaryParameter\IndexRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(IndexRequest $request)
    {
        return response()->json(
            new DisciplinaryParameterPaginatedCollection(
                DisciplinaryParameter::where(
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
     * @param  \App\Http\Requests\Ajax\Master\DisciplinaryParameter\ShowRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(ShowRequest $request, $id)
    {
        return response()->json(
            new DisciplinaryParameterRelatedResource(DisciplinaryParameter::findOrFail($id)),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Ajax\Master\DisciplinaryParameter\StoreRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreRequest $request)
    {
        return response()->json(
            new DisciplinaryParameterRelatedResource(
                $this->transmit(new StoreTask, $request)
            ),
            201
        );
    }

    /**
     * @param  \App\Http\Requests\Ajax\Master\DisciplinaryParameter\AmendRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function amend(AmendRequest $request)
    {
        return response()->json(
            new DisciplinaryParameterRelatedResource(
                $this->transmit(new AmendTask, $request)
            ),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Ajax\Master\DisciplinaryParameter\ReviseActivationRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function reviseActivate(ReviseActivationRequest $request)
    {
        return response()->json(
            new DisciplinaryParameterRelatedResource(
                $this->transmit(new ReviseActivationTask, $request, true)
            ),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Ajax\Master\DisciplinaryParameter\ReviseActivationRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function reviseDeactivate(ReviseActivationRequest $request)
    {
        return response()->json(
            new DisciplinaryParameterRelatedResource(
                $this->transmit(new ReviseActivationTask, $request, false)
            ),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Ajax\Master\DisciplinaryParameter\DestroyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(DestroyRequest $request)
    {
        $generalCleaningActivity = DisciplinaryParameter::findOrFail($request->input('id'));
        $this->transaction(fn () => $generalCleaningActivity->delete());
        return response()->noContent();
    }
}
