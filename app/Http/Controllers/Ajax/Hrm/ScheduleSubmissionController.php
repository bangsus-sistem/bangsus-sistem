<?php

namespace App\Http\Controllers\Ajax\Hrm;

use Bsb\Foundation\Http\Controller;
use App\Models\Hrm\ScheduleSubmission;
use Illuminate\Http\Request;
use App\Http\Requests\Ajax\Hrm\ScheduleSubmission\{
    IndexRequest,
    ShowRequest,
    StoreRequest,
    AmendRequest,
    ReviseAdmissionRequest,
    DestroyRequest,
};
use App\Tasks\Hrm\ScheduleSubmission\{
    StoreTask,
    AmendTask,
    ReviseAdmissionTask,
};
use App\Transformer\SingleCollections\Hrm\ScheduleSubmissionSingleCollection;
use App\Transformer\PaginatedCollections\Hrm\ScheduleSubmissionPaginatedCollection;
use App\Transformer\RelatedResources\Hrm\ScheduleSubmissionRelatedResource;

class ScheduleSubmissionController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function manifest()
    {
        return response()->json(
            new ScheduleSubmissionSingleCollection(ScheduleSubmission::all()),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Ajax\Hrm\ScheduleSubmission\IndexRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(IndexRequest $request)
    {
        return response()->json(
            new ScheduleSubmissionPaginatedCollection(
                ScheduleSubmission::where(
                    $this->buildWhere($request)
                        ->with($request)
                        ->index('branch_id')->mode('id')
                        ->index('schedule_date')
                            ->column(['schedule_in_datetime'])
                            ->mode('date')
                        ->index('attendance_type_id')->mode('id')
                        ->done()
                )
                    ->whereHas('employee', function ($query) use ($request) {
                        return $query->where(
                            $this->buildWhere()
                                ->with($request)
                                ->index('code')->mode('string')
                                ->index('full_name')->mode('string')
                                ->done()
                        );
                    })
                    ->userAuthorized()
                    ->paginate(100000000000000)
            ),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Ajax\Hrm\ScheduleSubmission\ShowRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(ShowRequest $request, $id)
    {
        return response()->json(
            new ScheduleSubmissionRelatedResource(
                ScheduleSubmission::userAuthorized()->findOrFail($id)),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Ajax\Hrm\ScheduleSubmission\StoreRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreRequest $request)
    {
        return response()->json(
            new ScheduleSubmissionRelatedResource(
                $this->transmit(new StoreTask, $request)
            ),
            201
        );
    }

    /**
     * @param  \App\Http\Requests\Ajax\Hrm\ScheduleSubmission\AmendRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function amend(AmendRequest $request)
    {
        return response()->json(
            new ScheduleSubmissionRelatedResource(
                $this->transmit(new AmendTask, $request)
            ),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Ajax\Hrm\ScheduleSubmission\ReviseAdmissionRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function reviseAdmit(ReviseAdmissionRequest $request)
    {
        return response()->json(
            new ScheduleSubmissionRelatedResource(
                $this->transmit(new ReviseAdmissionTask, $request, true)
            ),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Ajax\Hrm\ScheduleSubmission\DestroyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(DestroyRequest $request)
    {
        $scheduleSubmission = ScheduleSubmission::findOrFail(
            $request->input('id')
        );
        $this->transaction(fn () => $scheduleSubmission->delete());
        return response()->noContent();
    }
}
