<?php

namespace App\Http\Controllers\Ajax\Hrm;

use Bsb\Foundation\Http\Controller;
use App\Models\Hrm\EmployeePhotoType;
use Illuminate\Http\Request;
use App\Http\Requests\Ajax\Hrm\EmployeePhotoType\{
    IndexRequest,
    ShowRequest,
    StoreRequest,
    AmendRequest,
    ReviseActivationRequest,
    DestroyRequest,
};
use App\Tasks\Hrm\EmployeePhotoType\{
    StoreTask,
    AmendTask,
    ReviseActivationTask,
};
use App\Transformer\SingleCollections\Hrm\EmployeePhotoTypeSingleCollection;
use App\Transformer\PaginatedCollections\Hrm\EmployeePhotoTypePaginatedCollection;
use App\Transformer\RelatedResources\Hrm\EmployeePhotoTypeRelatedResource;

class EmployeePhotoTypeController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function manifest()
    {
        return response()->json(new EmployeePhotoTypeSingleCollection(EmployeePhotoType::all()), 200);
    }

    /**
     * @param  \App\Http\Requests\Ajax\Hrm\EmployeePhotoType\IndexRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(IndexRequest $request)
    {
        return response()->json(
            new EmployeePhotoTypePaginatedCollection(
                EmployeePhotoType::where(
                    $this->buildWhere($request)
                        ->with($request)
                        ->index('code')->mode('string')
                        ->index('name')->mode('string')
                        ->index('active')->mode('boolean')
                        ->index('required')->mode('boolean')
                        ->done()
                )
                    ->orderBy($request->input('sort'), $request->input('order'))
                    ->paginate($request->input('count'))
            ),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Ajax\Hrm\EmployeePhotoType\ShowRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(ShowRequest $request, $id)
    {
        return response()->json(
            new EmployeePhotoTypeRelatedResource(EmployeePhotoType::findOrFail($id)),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Ajax\Hrm\EmployeePhotoType\StoreRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreRequest $request)
    {
        return response()->json(
            new EmployeePhotoTypeRelatedResource(
                $this->transmit(new StoreTask, $request)
            ),
            201
        );
    }

    /**
     * @param  \App\Http\Requests\Ajax\Hrm\EmployeePhotoType\AmendRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function amend(AmendRequest $request)
    {
        return response()->json(
            new EmployeePhotoTypeRelatedResource(
                $this->transmit(new AmendTask, $request)
            ),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Ajax\Hrm\EmployeePhotoType\ReviseActivationRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function reviseActivate(ReviseActivationRequest $request)
    {
        return response()->json(
            new EmployeePhotoTypeRelatedResource(
                $this->transmit(new ReviseActivationTask, $request, true)
            ),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Ajax\Hrm\EmployeePhotoType\ReviseActivationRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function reviseDeactivate(ReviseActivationRequest $request)
    {
        return response()->json(
            new EmployeePhotoTypeRelatedResource(
                $this->transmit(new ReviseActivationTask, $request, false)
            ),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Ajax\Hrm\EmployeePhotoType\DestroyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(DestroyRequest $request)
    {
        $addressType = EmployeePhotoType::findOrFail($request->input('id'));
        $this->transaction(fn () => $addressType->delete());
        return response()->noContent();
    }
}
