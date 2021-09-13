<?php

namespace App\Tasks\Hrm\AttendanceType;

use Bsb\Foundation\Task;
use App\Models\Hrm\AttendanceType;

class ReviseActivationTask extends Task
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  bool  $state
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function handle($request, $state = true)
    {
        $attendanceType = AttendanceType::findOrFail($request->input('id'));
        $this->transaction(
            function () use ($request, $attendanceType, $state) {
                $attendanceType->active = $state;
                $attendanceType->save();
            }
        );

        return $attendanceType;
    }
}
