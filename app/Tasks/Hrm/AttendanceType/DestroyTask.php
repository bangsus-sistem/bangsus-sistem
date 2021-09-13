<?php

namespace App\Tasks\Hrm\AttendanceType;

use Bsb\Foundation\Task;
use App\Models\Hrm\AttendanceType;

class DestroyTask extends Task
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    public function handle($request)
    {
        $attendanceType = AttendanceType::findOrFail($request->input('id'));
        $this->transaction(fn () => $attendanceType->delete());
    }
}
