<?php

namespace App\Tasks\Hrm\AttendanceType;

use Bsb\Foundation\Task;
use App\Models\Hrm\AttendanceType;

class StoreTask extends Task
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function handle($request)
    {
        $attendanceType = AttendanceType;
        $this->transaction(
            function () use ($request, $attendanceType) {
                $attendanceType->code = $request->input('code');
                $attendanceType->name = $request->input('name');
                $attendanceType->active = true;
                $attendanceType->description = $request->input('description');
                $attendanceType->note = $request->input('note');
                $attendanceType->save();
            }
        );

        return $attendanceType;
    }
}
