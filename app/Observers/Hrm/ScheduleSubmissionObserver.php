<?php

namespace App\Observers\Hrm;

use Bsb\Foundation\Observer;
use App\Models\Hrm\Attendance;

class ScheduleSubmissionObserver extends Observer
{
    /**
     * @param  \Illuminate\Database\Eloquent\Model  $employee
     * @return void
     */
    public static function admitting($scheduleSubmission)
    {
        $attendance = Attendance::where(
            function ($query) use ($scheduleSubmission) {
                return $query->whereDate('schedule_in_datetime', $scheduleSubmission->schedule_in_datetime->format('Y-m-d'))
                    ->orWhere(function ($query) use ($scheduleSubmission) {
                        return $query->whereNull('schedule_in_datetime')
                            ->whereDate('attendance_in_datetime', $scheduleSubmission->schedule_in_datetime)->format('Y-m-d');
                    });
            }
        )
            ->where('employee_id', $scheduleSubmission->employee_id)
            ->where('branch_id', $scheduleSubmission->branch_id)
            ->first();

        if (is_null($attendance)) {
            $attendance = new Attendance;
            $attendance->employee_id = $scheduleSubmission->employee_id;
            $attendace->branch_id = $scheduleSubmission->branch_id;
        }

        $attendance->schedule_in_datetime = $scheduleSubmission->schedule_in_datetime;
        $attendance->schedule_out_datetime = $scheduleSubmission->schedule_out_datetime;

        return true;
    }
}
