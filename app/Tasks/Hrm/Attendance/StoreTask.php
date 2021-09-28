<?php

namespace App\Tasks\Hrm\Attendance;

use Bsb\Foundation\Task;
use App\Models\Hrm\Attendance;
use Carbon\Carbon;

class StoreTask extends Task
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function handle($request)
    {
        $attendance = new Attendance;
        $this->transaction(
            function () use ($request, $attendance) {
                $attendance->employee_id = $request->input('employee_id');
                $attendance->branch_id = $request->input('branch_id');
                $attendance->attendance_type_id = $request->input('attendance_type_id');
                $attendance->image_in_id = $request->input('image_in_id');
                $attendance->image_out_id = $request->input('image_out_id');
                $attendance->schedule_in_datetime = $request->input('schedule_in_datetime') == null ? null : (new Carbon($request->input('schedule_in_datetime')))->addHours($request->_timezone)->format('Y-m-d H:i:s');
                $attendance->schedule_out_datetime = $request->input('schedule_out_datetime') == null ? null : (new Carbon($request->input('schedule_out_datetime')))->addHours($request->_timezone)->format('Y-m-d H:i:s');
                $attendance->attendance_in_datetime = $request->input('attendance_in_datetime') == null ? null : (new Carbon($request->input('attendance_in_datetime')))->addHours($request->_timezone)->format('Y-m-d H:i:s');
                $attendance->attendance_out_datetime = $request->input('attendance_out_datetime') == null ? null : (new Carbon($request->input('attendance_out_datetime')))->addHours($request->_timezone)->format('Y-m-d H:i:s');
                $attendance->save();
            }
        );

        return $attendance;
    }
}
