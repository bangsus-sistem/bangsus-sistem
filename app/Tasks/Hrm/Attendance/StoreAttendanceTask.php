<?php

namespace App\Tasks\Hrm\Attendance;

use Bsb\Foundation\Task;
use App\Models\Hrm\Attendance;
use Carbon\Carbon;

class StoreAttendanceTask extends Task
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function handle($request)
    {
        $attendanceObj = $this->getAttendance($request);
        $attendance = $attendanceObj->attendance;
        $mode = $attendanceObj->mode;

        $this->transaction(
            function () use ($request, $attendance, $mode) {
                $attendance->employee_id = $request->input('employee_id');
                $attendance->branch_id = $request->input('branch_id');
                $attendance->attendance_type_id = $request->input('attendance_type_id');
                $attendance->image_id = $request->input('image_id');
                $attendance->position = \DB::raw(
                    "GeomFromText('POINT({$request->input('position.latitude')} {$request->input('position.longitude')})')"
                );
                $datetime = $request->input('datetime');
                switch ($mode) {
                    case 'in' :
                        $attendance->attendance_in_datetime = $datetime;
                        break;
                    case 'out' :
                        $attendance->attendance_out_datetime = $datetime;
                        break;
                }

                $attendance->save();
            }
        );

        return $attendance;
    }

    /**
     * Get the attendance instance.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return Object
     */
    private function getAttendance($request)
    {
        // Init the variables.
        $attendance = null;
        $mode = null;
        $datetime = $request->input('datetime');

        // Init the where array.
        $wheres = $this->buildWhere()
            ->with($request)
            ->usage('input')
            ->index('employee_id')->mode('id')
            ->index('branch_id')->mode('id')
            ->index('attendance_type_id')->mode('id')
            ->done();

        // Check if attendance with filled attendance_in_datetime exists.
        $attendance = Attendance::where($wheres)
            ->whereDate(
                'attendance_in_datetime',
                (new Carbon($datetime))->format('Y-m-d')
            )
            ->first();
        if ( ! is_null($attendance)) {
            $mode = 'out';
            return (object) [
                'attendance' => $attendance,
                'mode' => $mode,
            ];
        }
        
        // Check if the schedule on the related day exists.
        $attendance = Attendance::where($wheres)
            ->whereDate(
                'schedule_in_datetime',
                (new Carbon($datetime))->format('Y-m-d')
            )
            ->first();
        if ( ! is_null($attendance)) {
            $mode = 'in';
            return (object) [
                'attendance' => $attendance,
                'mode' => $mode,
            ];
        }

        // Else just throw in some new stuff.
        $mode = 'in';
        return (object) [
            'attendance' => new Attendance,
            'mode' => $mode,
        ];
    }
}
