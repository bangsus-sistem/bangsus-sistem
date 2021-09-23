<?php

namespace App\Http\Controllers\Ajax\Hrm;

use Bsb\Foundation\Http\Controller;
use App\Models\Hrm\Employee;
use Illuminate\Http\Request;
use App\Http\Requests\Ajax\Hrm\Employee\{
    IndexRequest,
    ShowRequest,
    StoreRequest,
    AmendRequest,
    ReviseAdmissionRequest,
    DestroyRequest,
};
use App\Tasks\Hrm\Employee\{
    StoreTask,
    AmendTask,
    ReviseAdmissionTask,
};
use App\Transformer\SingleCollections\Hrm\EmployeeSingleCollection;
use App\Transformer\PaginatedCollections\Hrm\EmployeePaginatedCollection;
use App\Transformer\RelatedResources\Hrm\EmployeeRelatedResource;

class EmployeeController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function manifest()
    {
        return response()->json(new EmployeeSingleCollection(Employee::all()), 200);
    }

    /**
     * @param  \Illuminate\Http\Request
     * @return \Illuminate\Http\JsonResponse
     */
    public function manifestByBranchAssignment(Request $request)
    {
        return response()->json(
            new EmployeeSingleCollection(
                Employee::whereHas('employeeAssignments', function ($query) use ($request) {
                    return $query->where('branch_id', $request->query('branch_id'));
                })->get()
            ), 
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Ajax\Hrm\Employee\IndexRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(IndexRequest $request)
    {
        return response()->json(
            new EmployeePaginatedCollection(
                Employee::where(
                    $this->buildWhere($request)
                        ->with($request)
                        ->index('code')->mode('nullable_string')
                        ->index('nik')->mode('nullable_string')
                        ->index('full_name')->mode('string')
                        ->index('gender_id')->mode('id')
                        ->done()
                )
                    ->extent(
                        $this->buildExtent()
                            ->with($request)
                            ->index('admitted')->mode('boolean')
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
     * @param  \App\Http\Requests\Ajax\Hrm\Employee\ShowRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(ShowRequest $request, $id)
    {
        return response()->json(
            new EmployeeRelatedResource(
                Employee::userAuthorized()->findOrFail($id)
            ),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Ajax\Hrm\Employee\StoreRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreRequest $request)
    {
        return response()->json(
            new EmployeeRelatedResource(
                $this->transmit(new StoreTask, $request)
            ),
            201
        );
    }

    /**
     * @param  \App\Http\Requests\Ajax\Hrm\Employee\AmendRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function amend(AmendRequest $request)
    {
        return response()->json(
            new EmployeeRelatedResource(
                $this->transmit(new AmendTask, $request)
            ),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Ajax\Hrm\Employee\ReviseAdmissionRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function reviseAdmit(ReviseAdmissionRequest $request)
    {
        return response()->json(
            new EmployeeRelatedResource(
                $this->transmit(new ReviseAdmissionTask, $request, true)
            ),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Ajax\Hrm\Employee\DestroyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(DestroyRequest $request)
    {
        $employee = Employee::findOrFail($request->input('id'));
        $this->transaction(fn () => $employee->delete());
        return response()->noContent();
    }
}
