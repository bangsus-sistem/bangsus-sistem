<?php

namespace App\Tasks\Hrm\Attendance;

use Bsb\Foundation\Task;
use App\Models\Hrm\Attendance;

class AmendTask extends Task
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function handle($request)
    {
        $attendance = Attendance::findOrFail($request->input('id'));
        $this->transaction(
            function () use ($request, $attendance) {
                $attendance->employee_id = $request->input('employee_id');
                $attendance->branch_id = $request->input('branch_id');
                $attendance->attendance_type_id = $request->input('attendance_type_id');
                $attendance->image_id = $request->input('image_id');
                $attendance->schedule_in_datetime = $request->input('schedule_in_datetime');
                $attendance->schedule_out_datetime = $request->input('schedule_out_datetime');
                $attendance->attendance_in_datetime = $request->input('attendance_in_datetime');
                $attendance->attendance_out_datetime = $request->input('attendance_out_datetime');
                $attendance->save();
            }
        );

        return $attendance;
    }
}
