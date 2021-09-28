<?php

namespace App\Tasks\Hrm\ScheduleSubmission;

use Bsb\Foundation\Task;
use App\Models\Hrm\ScheduleSubmission;
use Carbon\Carbon;

class AmendTask extends Task
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function handle($request)
    {
        $scheduleSubmission = ScheduleSubmission::findOrFail($request->input('id'));
        $this->transaction(
            function () use ($request, $scheduleSubmission) {
                $scheduleSubmission->employee_id = $request->input('employee_id');
                $scheduleSubmission->branch_id = $request->input('branch_id');
                $scheduleSubmission->attendance_type_id = $request->input('attendance_type_id');
                $scheduleSubmission->schedule_in_datetime = $request->input('schedule_in_datetime') == null ? null : (new Carbon($request->input('schedule_in_datetime')))->addHours($request->_timezone)->format('Y-m-d H:i:s');
                $scheduleSubmission->schedule_out_datetime = $request->input('schedule_out_datetime') == null ? null : (new Carbon($request->input('schedule_out_datetime')))->addHours($request->_timezone)->format('Y-m-d H:i:s');
                $scheduleSubmission->save();
            }
        );

        return $scheduleSubmission;
    }
}
