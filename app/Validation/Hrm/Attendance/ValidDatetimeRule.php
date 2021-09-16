<?php

namespace App\Validation\Hrm\Attendance;

use Bsb\Foundation\Validation\RequestRule;
use Illuminate\Contracts\Validation\Rule;
use App\Models\Hrm\Attendance;
use Carbon\Carbon;

class ValidDatetimeRule extends RequestRule implements Rule
{
    /**
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $attendance = Attendance::where(
            $this->buildWhere()
                ->with($this->request)
                ->usage('input')
                ->index('employee_id')->mode('id')
                ->index('branch_id')->mode('id')
                ->index('attendance_type_id')->mode('id')
                ->done()
        )
            ->whereDate('attendance_in_datetime', (new Carbon($value))->format('Y-m-d'))
            ->whereNotNull('attendance_out_datetime')
            ->first();

        if (is_null($attendance)) {
            $this->setMessage('Anda sudah selesai bekerja hari ini.');
            return false;
        }

        return true;
    }
}
