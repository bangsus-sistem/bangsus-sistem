<?php

namespace App\Tasks\Hrm\ScheduleSubmission;

use Bsb\Foundation\Task;
use App\Models\Hrm\ScheduleSubmission;

class ReviseAdmissionTask extends Task
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  bool  $state
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function handle($request, $state = true)
    {
        $scheduleSubmission = ScheduleSubmission::findOrFail(
            $request->input('id')
        );
        $this->transaction(
            function () use ($request, $scheduleSubmission, $state) {
                $scheduleSubmission->admit();
            }
        );

        return $scheduleSubmission;
    }
}
