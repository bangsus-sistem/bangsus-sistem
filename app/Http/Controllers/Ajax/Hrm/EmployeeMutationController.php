<?php

namespace App\Http\Controllers\Ajax\Hrm;

use Bsb\Foundation\Http\Controller;
use App\Models\Hrm\EmployeeMutation;
use Illuminate\Http\Request;
use App\Http\Requests\Ajax\Hrm\EmployeeMutation\{
    IndexRequest,
    ShowRequest,
    StoreRequest,
    AmendRequest,
    ReviseAdmissionRequest,
    DestroyRequest,
};
use App\Tasks\Hrm\EmployeeMutation\{
    StoreTask,
    AmendTask,
    ReviseAdmissionTask,
};
use App\Transformer\SingleCollections\Hrm\EmployeeMutationSingleCollection;
use App\Transformer\PaginatedCollections\Hrm\EmployeeMutationPaginatedCollection;
use App\Transformer\RelatedResources\Hrm\EmployeeMutationRelatedResource;

class EmployeeMutationController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function manifest()
    {
        return response()->json(
            new EmployeeMutationSingleCollection(EmployeeMutation::all()),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Ajax\Hrm\EmployeeMutation\IndexRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(IndexRequest $request)
    {
        return response()->json(
            new EmployeeMutationPaginatedCollection(
                EmployeeMutation::where(
                    $this->buildWhere($request)
                        ->with($request)
                        ->index('employee_assignment_id')->mode('id')
                        ->index('job_title_id')->mode('id')
                        ->done()
                )
                    ->extent(
                        $this->buildExtent()
                            ->with($request)
                            ->index('admitted')->mode('boolean')
                            ->done()
                    )
                    ->orderBy($request->input('sort'), $request->input('order'))
                    ->paginate($request->input('count'))
            ),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Ajax\Hrm\EmployeeMutation\ShowRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(ShowRequest $request, $id)
    {
        return response()->json(
            new EmployeeMutationRelatedResource(
                EmployeeMutation::findOrFail($id)
            ),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Ajax\Hrm\EmployeeMutation\StoreRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreRequest $request)
    {
        return response()->json(
            new EmployeeMutationRelatedResource(
                $this->transmit(new StoreTask, $request)
            ),
            201
        );
    }

    /**
     * @param  \App\Http\Requests\Ajax\Hrm\EmployeeMutation\AmendRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function amend(AmendRequest $request)
    {
        return response()->json(
            new EmployeeMutationRelatedResource(
                $this->transmit(new AmendTask, $request)
            ),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Ajax\Hrm\EmployeeMutation\ReviseAdmissionRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function reviseAdmit(ReviseAdmissionRequest $request)
    {
        return response()->json(
            new EmployeeMutationRelatedResource(
                $this->transmit(new ReviseAdmissionTask, $request, true)
            ),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Ajax\Hrm\EmployeeMutation\DestroyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(DestroyRequest $request)
    {
        $employeeMutation = EmployeeMutation::findOrFail($request->input('id'));
        $this->transaction(fn () => $employeeMutation->delete());
        return response()->noContent();
    }
}
