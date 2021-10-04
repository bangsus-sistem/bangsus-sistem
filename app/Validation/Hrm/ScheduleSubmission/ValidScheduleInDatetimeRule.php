<?php

namespace App\Validation\Hrm\ScheduleSubmission;

use Bsb\Foundation\Validation\RequestRule;
use Illuminate\Contracts\Validation\Rule;
use App\Models\Hrm\ScheduleSubmission;
use Carbon\Carbon;

class ValidScheduleInDatetimeRule extends RequestRule implements Rule
{
    /**
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $scheduleSubmission = ScheduleSubmission::where(
            $this->buildWhere()
                ->with($this->request)
                ->usage('input')
                ->index('employee_id')->mode('id')
                ->index('branch_id')->mode('id')
                ->index('attendance_type_id')->mode('id')
                ->done()
        )
            ->whereDate('schedule_in_datetime', (new Carbon($value))->format('Y-m-d'))
            ->isNotAdmitted();

        if ($this->request->exists('id')) {
            $scheduleSubmission->where('id', '!=', $this->request->input('id'));
        }

        $scheduleSubmission = $scheduleSubmission->first();

        if ( ! is_null($scheduleSubmission)) {
            $this->setMessage('Pengajuan Jadwal untuk tanggal '.(new Carbon($value))->format('Y-m-d').' sudah ada.');
            return false;
        }

        return true;
    }
}
