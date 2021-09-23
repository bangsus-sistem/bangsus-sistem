<?php

namespace App\Http\Controllers\Ajax\Hrm;

use Bsb\Foundation\Http\Controller;
use App\Models\Hrm\Attendance;
use Illuminate\Http\Request;
use App\Http\Requests\Ajax\Hrm\Attendance\{
    IndexRequest,
    ShowRequest,
    StoreRequest,
    StoreAttendanceRequest,
    AmendRequest,
    DestroyRequest,
};
use App\Tasks\Hrm\Attendance\{
    StoreTask,
    StoreAttendanceTask,
    AmendTask,
};
use App\Transformer\SingleCollections\Hrm\AttendanceSingleCollection;
use App\Transformer\PaginatedCollections\Hrm\AttendancePaginatedCollection;
use App\Transformer\RelatedResources\Hrm\AttendanceRelatedResource;

class AttendanceController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function manifest()
    {
        return response()->json(
            new AttendanceSingleCollection(Attendance::all()),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Ajax\Hrm\Attendance\IndexRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(IndexRequest $request)
    {
        return response()->json(
            new AttendancePaginatedCollection(
                Attendance::where(
                    $this->buildWhere($request)
                        ->with($request)
                        ->index('branch_id')->mode('id')
                        ->index('attendance_date')
                            ->column(['schedule_in_datetime', 'attendance_in_datetime'])
                            ->mode('date')
                        ->index('attendance_type_id')->mode('id')
                        ->done()
                )
                    ->userAuthorized()
                    ->paginate(100000000000000)
            ),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Ajax\Hrm\Attendance\ShowRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(ShowRequest $request, $id)
    {
        return response()->json(
            new AttendanceRelatedResource(
                Attendance::userAuthorized()->findOrFail($id)),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Ajax\Hrm\Attendance\StoreRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreRequest $request)
    {
        return response()->json(
            new AttendanceRelatedResource(
                $this->transmit(new StoreTask, $request)
            ),
            201
        );
    }

    /**
     * @param  \App\Http\Requests\Ajax\Hrm\Attendance\StoreAttendanceRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function storeAttendance(StoreAttendanceRequest $request)
    {
        return response()->json(
            new AttendanceRelatedResource(
                $this->transmit(new StoreAttendanceTask, $request)
            ),
            201
        );
    }

    /**
     * @param  \App\Http\Requests\Ajax\Hrm\Attendance\AmendRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function amend(AmendRequest $request)
    {
        return response()->json(
            new AttendanceRelatedResource(
                $this->transmit(new AmendTask, $request)
            ),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Ajax\Hrm\Attendance\DestroyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(DestroyRequest $request)
    {
        $employee = Attendance::findOrFail($request->input('id'));
        $this->transaction(fn () => $employee->delete());
        return response()->noContent();
    }
}
