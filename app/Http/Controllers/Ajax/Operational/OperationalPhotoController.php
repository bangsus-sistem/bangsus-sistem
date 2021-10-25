<?php

namespace App\Http\Controllers\Ajax\Operational;

use Bsb\Foundation\Http\Controller;
use App\Models\Operational\OperationalPhoto;
use Illuminate\Http\Request;
use App\Http\Requests\Ajax\Operational\OperationalPhoto\{
    IndexRequest,
    ShowRequest,
    StoreRequest,
    AmendRequest,
    ReviseActivationRequest,
    DestroyRequest,
};
use App\Tasks\Operational\OperationalPhoto\{
    StoreTask,
    AmendTask,
    ReviseActivationTask,
};
use App\Transformer\SingleCollections\Operational\OperationalPhotoSingleCollection;
use App\Transformer\PaginatedCollections\Operational\OperationalPhotoPaginatedCollection;
use App\Transformer\RelatedResources\Operational\OperationalPhotoRelatedResource;

class OperationalPhotoController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function manifest()
    {
        return response()->json(new OperationalPhotoSingleCollection(OperationalPhoto::all()), 200);
    }

    /**
     * @param  \App\Http\Requests\Ajax\Operational\OperationalPhoto\IndexRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(IndexRequest $request)
    {
        return response()->json(
            new OperationalPhotoPaginatedCollection(
                OperationalPhoto::where(
                    $this->buildWhere($request)
                        ->with($request)
                        ->index('code')->mode('string')
                        // ->index('transaction_date')->column(['transaction_datetime'])->mode('date')
                        ->index('branch_id')->mode('id')
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
     * @param  \App\Http\Requests\Ajax\Operational\OperationalPhoto\ShowRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(ShowRequest $request, $id)
    {
        return response()->json(
            new OperationalPhotoRelatedResource(OperationalPhoto::findOrFail($id)),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Ajax\Operational\OperationalPhoto\StoreRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreRequest $request)
    {
        return response()->json(
            new OperationalPhotoRelatedResource(
                $this->transmit(new StoreTask, $request)
            ),
            201
        );
    }

    /**
     * @param  \App\Http\Requests\Ajax\Operational\OperationalPhoto\AmendRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function amend(AmendRequest $request)
    {
        return response()->json(
            new OperationalPhotoRelatedResource(
                $this->transmit(new AmendTask, $request)
            ),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Ajax\Operational\OperationalPhoto\ReviseActivationRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function reviseActivate(ReviseActivationRequest $request)
    {
        return response()->json(
            new OperationalPhotoRelatedResource(
                $this->transmit(new ReviseActivationTask, $request, true)
            ),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Ajax\Operational\OperationalPhoto\ReviseActivationRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function reviseDeactivate(ReviseActivationRequest $request)
    {
        return response()->json(
            new OperationalPhotoRelatedResource(
                $this->transmit(new ReviseActivationTask, $request, false)
            ),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Ajax\Operational\OperationalPhoto\DestroyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(DestroyRequest $request)
    {
        $disciplinaryParameter = OperationalPhoto::findOrFail($request->input('id'));
        $this->transaction(fn () => $disciplinaryParameter->delete());
        return response()->noContent();
    }
}
