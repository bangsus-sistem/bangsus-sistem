<?php

namespace App\Http\Controllers\Ajax\Hrm;

use Bsb\Foundation\Http\Controller;
use App\Models\Hrm\EmployeeAssignment;
use Illuminate\Http\Request;
use App\Http\Requests\Ajax\Hrm\EmployeeAssignment\{
    IndexRequest,
    ShowRequest,
    StoreRequest,
    AmendRequest,
    ReviseAdmissionRequest,
    DestroyRequest,
};
use App\Tasks\Hrm\EmployeeAssignment\{
    StoreTask,
    AmendTask,
    ReviseAdmissionTask,
};
use App\Transformer\SingleCollections\Hrm\EmployeeAssignmentSingleCollection;
use App\Transformer\PaginatedCollections\Hrm\EmployeeAssignmentPaginatedCollection;
use App\Transformer\RelatedResources\Hrm\EmployeeAssignmentRelatedResource;

class EmployeeAssignmentController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function manifest()
    {
        return response()->json(
            new EmployeeAssignmentSingleCollection(EmployeeAssignment::all()),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Ajax\Hrm\EmployeeAssignment\IndexRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(IndexRequest $request)
    {
        return response()->json(
            new EmployeeAssignmentPaginatedCollection(
                EmployeeAssignment::where(
                    $this->buildWhere($request)
                        ->with($request)
                        ->index('employee_id')->mode('id')
                        ->index('branch_id')->mode('id')
                        ->index('first_job_title_id')->mode('id')
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
     * @param  \App\Http\Requests\Ajax\Hrm\EmployeeAssignment\ShowRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(ShowRequest $request, $id)
    {
        return response()->json(
            new EmployeeAssignmentRelatedResource(
                EmployeeAssignment::findOrFail($id)
            ),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Ajax\Hrm\EmployeeAssignment\StoreRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreRequest $request)
    {
        return response()->json(
            new EmployeeAssignmentRelatedResource(
                $this->transmit(new StoreTask, $request)
            ),
            201
        );
    }

    /**
     * @param  \App\Http\Requests\Ajax\Hrm\EmployeeAssignment\AmendRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function amend(AmendRequest $request)
    {
        return response()->json(
            new EmployeeAssignmentRelatedResource(
                $this->transmit(new AmendTask, $request)
            ),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Ajax\Hrm\EmployeeAssignment\ReviseAdmissionRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function reviseAdmit(ReviseAdmissionRequest $request)
    {
        return response()->json(
            new EmployeeAssignmentRelatedResource(
                $this->transmit(new ReviseAdmissionTask, $request, true)
            ),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Ajax\Hrm\EmployeeAssignment\DestroyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(DestroyRequest $request)
    {
        $employeeAssignment = EmployeeAssignment::findOrFail($request->input('id'));
        $this->transaction(fn () => $employeeAssignment->delete());
        return response()->noContent();
    }
}
