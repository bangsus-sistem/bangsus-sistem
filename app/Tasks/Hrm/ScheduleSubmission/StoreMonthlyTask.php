<?php

namespace App\Tasks\Hrm\ScheduleSubmission;

use Bsb\Foundation\Task;
use App\Models\Hrm\ScheduleSubmission;
use Carbon\Carbon;

class StoreMonthlyTask extends Task
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function handle($request)
    {
        ScheduleSubmission::where(
            $this->buildWhere()
                ->with($request)
                ->index('employee_ids')->column('employee_id')->mode('id_array')
                ->index('branch_id')->mode('id')
                ->index('attendance_type_id')->mode('id')
                ->index(['start_date', 'end_date'])->column('schedule_in_datetime')->mode('date_between')
                ->done()
        )->where('monthly', true)->delete();
        
        foreach ($request->input('schedule_submissions') as $employeeId => $scheduleSubmission) {
            if (is_array($scheduleSubmission)) {
                foreach ($scheduleSubmission as $date => $time) {
                    if ($time == '' || is_null($time)) {
                        continue;
                    }
                    $time = Carbon::createFromFormat('H:i', $time)->addHours($request->_timezone)->format('H:i');
                    ScheduleSubmission::create(
                        [
                            'employee_id' => $employeeId,
                            'branch_id' => $request->input('branch_id'),
                            'attendance_type_id' => $request->input('attendance_type_id'),
                            'schedule_in_datetime' => $date.' '.$time.':00',
                            'monthly' => true
                        ]
                    );
                }
            }
        }
    }
}
