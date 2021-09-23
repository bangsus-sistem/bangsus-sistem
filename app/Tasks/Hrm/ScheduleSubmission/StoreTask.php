<?php

namespace App\Tasks\Hrm\ScheduleSubmission;

use Bsb\Foundation\Task;
use App\Models\Hrm\ScheduleSubmission;

class StoreTask extends Task
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function handle($request)
    {
        $scheduleSubmission = new ScheduleSubmission;
        $this->transaction(
            function () use ($request, $scheduleSubmission) {
                $scheduleSubmission->employee_id = $request->input('employee_id');
                $scheduleSubmission->branch_id = $request->input('branch_id');
                $scheduleSubmission->attendance_type_id = $request->input('attendance_type_id');
                $scheduleSubmission->monthly = false;
                $scheduleSubmission->schedule_in_datetime = $request->input('schedule_in_datetime');
                $scheduleSubmission->schedule_out_datetime = $request->input('schedule_out_datetime');
                $scheduleSubmission->save();
            }
        );

        return $scheduleSubmission;
    }
}
