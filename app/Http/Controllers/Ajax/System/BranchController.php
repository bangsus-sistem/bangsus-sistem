<?php

namespace App\Http\Controllers\Ajax\System;

use Bsb\Foundation\Http\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Ajax\System\Branch\{
    IndexRequest,
    ShowRequest,
    StoreRequest,
    AmendRequest,
    ReviseActivationRequest,
    DestroyRequest,
};
use App\Models\System\Branch;
use App\Tasks\System\Branch\{
    StoreTask,
    AmendTask,
    ReviseActivationTask,
    DestroyTask,
};
use App\Transformer\SingleCollections\System\BranchSingleCollection;
use App\Transformer\PaginatedCollections\System\BranchPaginatedCollection;
use App\Transformer\RelatedResources\System\BranchRelatedResource;

class BranchController extends Controller
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function manifest(Request $request)
    {
        return response()->json(
            new BranchSingleCollection(
                $request->boolean('authorized', true)
                    ?   Branch::all()
                    :   Branch::userAuthorized()->get()
            ),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Ajax\System\Branch\IndexRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(IndexRequest $request)
    {
        return response()->json(
            new BranchPaginatedCollection(
                Branch::where(
                    $this->buildWhere()
                        ->with($request)
                        ->index('code')->mode('string')
                        ->index('name')->mode('string')
                        ->index('branch_type_id')->mode('id')
                        ->index('active')->mode('boolean')
                        ->done()
                )
                    ->userAuthorized()
                    ->orderBy($request->input('sort'), $request->input('order'))
                    ->paginate($request->input('count'))
            ),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Ajax\System\Branch\ShowRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(ShowRequest $request, int $id)
    {
        return response()->json(
            new BranchRelatedResource(Branch::findOrFail($id)),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Ajax\System\Branch\StoreRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreRequest $request)
    {
        return response()->json(
            new BranchRelatedResource(
                $this->transmit(new StoreTask, $request)
            ),
            201
        );
    }

    /**
     * @param  \App\Http\Requests\Ajax\System\Branch\AmendRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function amend(AmendRequest $request)
    {
        return response()->json(
            new BranchRelatedResource(
                $this->transmit(new AmendTask, $request)
            ),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Ajax\System\Branch\ReviseActivationRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function reviseActivate(ReviseActivationRequest $request)
    {
        return response()->json(
            new BranchRelatedResource(
                $this->transmit(new ReviseActivationTask, $request, true)
            ),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Ajax\System\Branch\ReviseActivationRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function reviseDeactivate(ReviseActivationRequest $request)
    {
        return response()->json(
            new BranchRelatedResource(
                $this->transmit(new ReviseActivationTask, $request, false)
            ),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Ajax\System\Branch\DestroyRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(DestroyRequest $request)
    {
        $this->transmit(new DestroyTask, $request);
        return response()->noContent();
    }
}
