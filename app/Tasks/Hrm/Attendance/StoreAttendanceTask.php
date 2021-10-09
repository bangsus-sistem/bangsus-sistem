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
                $datetime = $request->input('datetime');
                switch ($mode) {
                    case 'in' :
                        $attendance->image_in_id = $request->input('image_id');
                        $attendance->attendance_in_datetime = $datetime;
                        $attendance->position_in = \DB::raw(
                            "GeomFromText('POINT({$request->input('position.latitude')} {$request->input('position.longitude')})')"
                        );
                        break;
                    case 'out' :
                        $attendance->image_out_id = $request->input('image_id');
                        $attendance->attendance_out_datetime = $datetime;
                        $attendance->position_out = \DB::raw(
                            "GeomFromText('POINT({$request->input('position.latitude')} {$request->input('position.longitude')})')"
                        );
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

        // Check if hanging attendance_in_datetime exists.
        $attendance = Attendance::where($wheres)
            ->orderBy('attendance_in_datetime', 'desc')
            ->whereNotNull('attendance_in_datetime')
            ->whereNull('attendance_out_datetime')
            ->first();
        if ( ! is_null($attendance)) {
            $mode = 'out';
            return (object) [
                'attendance' => $attendance,
                'mode' => $mode,
            ];
        }

        // Check if the given day is different on the local timezone and the GMT
        $date = (new Carbon($datetime))->format('Y-m-d');
        $localDate = (new Carbon($datetime))->subHours($request->_timezone)
            ->format('Y-m-d');
        
        if ($date == $localDate) {
            $attendances = Attendance::where($wheres)
                ->whereDate(
                    'schedule_in_datetime',
                    $localDate
                )
                ->orWhereDate(
                    'schedule_in_datetime',
                    $date
                )
                ->get();
            dd($attendances, $attendances->toArray());
            
            if ($attendances->count() == 2) {
                $attendances = $attendances->toArray();

                $firstDiff = (new Carbon($attendances[0]->schedule_in_datetime))->diffInSeconds($datetime);
                $secondDiff = (new Carbon($attendances[1]->schedule_in_datetime))->diffInSeconds($datetime);

                $attendance = $firstDiff > $secondDiff ? $attendance[0] : $attendance[1];

                return (object) [
                    'attendance' => Attendance::find($attendance['id']),
                    'mode' => 'in',
                ];
            } else {
                return (object) [
                    'attendance' => $attendances->first(),
                    'mode' => 'in',
                ];
            }
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
