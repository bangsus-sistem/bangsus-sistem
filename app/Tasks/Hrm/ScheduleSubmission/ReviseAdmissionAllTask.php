<?php

namespace App\Tasks\Hrm\ScheduleSubmission;

use Bsb\Foundation\Task;
use App\Models\Hrm\ScheduleSubmission;

class ReviseAdmissionAllTask extends Task
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function handle($request)
    {
        $month = (int) explode('-', $request->input('month'))[1];
        $year = (int) explode('-', $request->input('month'))[0];

        $scheduleSubmissions = ScheduleSubmission::whereMonth('schedule_in_datetime', $month)
            ->whereYear('schedule_in_datetime', $year)
            ->get();
        
        $this->transaction(
            function () use ($request, $scheduleSubmissions) {
                $scheduleSubmissions->each(fn ($scheduleSubmission) => $scheduleSubmission->admit());
            }
        );

        return $scheduleSubmissions;
    }
}
